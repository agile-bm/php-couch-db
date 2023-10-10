<?php

namespace AgileBM\PhpCouchDb;

class Connection extends Base {
    private $_objClient = null;
    private $_objAuthenticator = null;

    public function __construct($strBaseURI, $intTimeout = 5) {
        $this->_data = [
            'strBaseURI' => $strBaseURI,
            'intTimeout' => (int)$intTimeout
        ];

        $this->_objClient = new \GuzzleHttp\Client([
            'base_uri' => $this->_data['strBaseURI'],
            'timeout' => $this->_data['intTimeout'],
            'cookies' => true,
            'version' => 1.1,
        ]);
    }

    public function Authenticate(Request\Authentication\Authenticate $objRequest): Response {
        $objResponse = $this->Request($objRequest);
        if ($objResponse->intStatusCode == 200) {
            $this->_objAuthenticator = $objRequest->GetAuthenticator();
        }

        return $objResponse;
    }

    public function Request(Request\Request $objRequest): Response {
        try {
            if (!is_null($this->_objAuthenticator)) {
                $objRequest->AddOption($this->_objAuthenticator->strKey, $this->_objAuthenticator->value);
            }

            $objRslt = $this->_objClient->request($objRequest->strMethod, $objRequest->strURI, $objRequest->arrOption);
            $objResponse = new Response();
            $objResponse->Load($objRslt->getStatusCode(), $objRslt->getReasonPhrase(), $objRslt->getBody()->getContents(), $objRslt->getHeaders());
            return $objResponse;
        } catch (\GuzzleHttp\Exception\ConnectException $ex) {
            throw new Exception($ex->getMessage(), 0, $ex);
        } catch (\GuzzleHttp\Exception\ServerException $ex) {
            throw new Exception($ex->getMessage(), 500, $ex);
        } catch (\GuzzleHttp\Exception\ClientException $ex) {
            throw new Exception($ex->getMessage(), 400, $ex);
        } catch (\GuzzleHttp\Exception\TooManyRedirectsException $ex) {
            throw new Exception($ex->getMessage(), 600, $ex);
        }
    }
}