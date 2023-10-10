<?php

namespace AgileBM\PhpCouchDb\Request\Database;

class Query {
    protected $_arrQuery = [];
    protected $_arrJson = [];

    public function __set($name, $value) {
        return false;
    }

    /**
     * Returns JSON part of the query object.
     *
     * @return array
     */
    public function GetJson(): array {
        if (!empty($this->_arrJson)) {
            $arrJson = [];
            foreach ($this->_arrJson as $key => $value) {
                if (is_bool($value)) {
                    $arrJson[$key] = $value ? 'true' : 'false';
                } else {
                    $arrJson[$key] = $value;
                }
            }

            return $arrJson;
        }

        return [];
    }

    /**
     * Returns the Query String part of the query object.
     *
     * @return array
     */
    public function GetQuery(): array {
        if (!empty($this->_arrQuery)) {
            $arrQuery = [];
            foreach ($this->_arrQuery as $key => $value) {
                if (is_bool($value)) {
                    $arrQuery[$key] = $value ? 'true' : 'false';
                } else {
                    $arrQuery[$key] = $value;
                }
            }

            return $arrQuery;
        }

        return [];
    }

    /**
     * Include encoding information in attachment stubs if include_docs is true and the particular attachment is compressed. Ignored if include_docs isn’t true. Default is false.
     */
    public function GetAttEncodingInfo(): bool {
        return (bool) $this->_arrQuery['att_encoding_info'] ?? false;
    }

    /**
     * Include encoding information in attachment stubs if include_docs is true and the particular attachment is compressed. Ignored if include_docs isn’t true. Default is false.
     */
    public function SetAttEncodingInfo(bool $value) {
        $this->_arrQuery['att_encoding_info'] = $value;
    }

    /**
     * Include the Base64-encoded content of attachments in the documents that are included if include_docs is true. Ignored if include_docs isn’t true. Default is false.
     */
    public function GetAttachments(): bool {
        return (bool) $this->_arrQuery['attachments'] ?? false;
    }

    /**
     * Include the Base64-encoded content of attachments in the documents that are included if include_docs is true. Ignored if include_docs isn’t true. Default is false.
     */
    public function SetAttachments(bool $value) {
        $this->_arrQuery['attachments'] = $value;
    }

    /**
     * Include conflicts information in response. Ignored if include_docs isn’t true. Default is false.
     */
    public function GetConflicts(): bool {
        return (bool) $this->_arrQuery['conflicts'] ?? false;
    }

    /**
     * Include conflicts information in response. Ignored if include_docs isn’t true. Default is false.
     */
    public function SetConflicts(bool $value) {
        $this->_arrQuery['conflicts'] = $value;
    }

    /**
     * Return the documents in descending order by key. Default is false.
     */
    public function GetDescending(): bool {
        return (bool) $this->_arrQuery['descending'] ?? false;
    }

    /**
     * Return the documents in descending order by key. Default is false.
     */
    public function SetDescending(bool $value) {
        $this->_arrQuery['descending'] = $value;
    }

    /**
     * Stop returning records when the specified key is reached.
     *
     * @return null|string
     */
    public function GetEndKey(): string {
        return (string) $this->_arrJson['end_key'] ?? null;
    }

    /**
     * Stop returning records when the specified key is reached.
     */
    public function SetEndKey(string $value) {
        $this->_arrJson['end_key'] = $value;
    }

    /**
     * Stop returning records when the specified document ID is reached. Ignored if endkey is not set.
     *
     * @return null|string
     */
    public function GetEndKeyDocId(): string {
        return (string) $this->_arrQuery['end_key_doc_id'] ?? null;
    }

    /**
     * Stop returning records when the specified document ID is reached. Ignored if endkey is not set.
     */
    public function SetEndKeyDocId(string $value) {
        $this->_arrQuery['end_key_doc_id'] = $value;
    }

    /**
     * Group the results using the reduce function to a group or single row. Implies reduce is true and the maximum group_level. Default is false.
     */
    public function GetGroup(): bool {
        return (bool) $this->_arrQuery['group'] ?? false;
    }

    /**
     * Group the results using the reduce function to a group or single row. Implies reduce is true and the maximum group_level. Default is false.
     */
    public function SetGroup(bool $value) {
        $this->_arrQuery['group'] = $value;
    }

    /**
     * Specify the group level to be used. Implies group is true.
     *
     * @return null|int
     */
    public function GetGroupLevel(): int {
        return (int) $this->_arrQuery['group_level'] ?? null;
    }

    /**
     * Specify the group level to be used. Implies group is true.
     */
    public function SetGroupLevel(int $value) {
        $this->_arrQuery['group_level'] = $value;
    }

    /**
     * Include the associated document with each row. Default is false.
     */
    public function GetIncludeDocs(): bool {
        return (bool) $this->_arrQuery['include_docs'] ?? false;
    }

    /**
     * Include the associated document with each row. Default is false.
     */
    public function SetIncludeDocs(bool $value) {
        $this->_arrQuery['include_docs'] = $value;
    }

    /**
     * Specifies whether the specified end key should be included in the result. Default is true.
     */
    public function GetInclusiveEnd(): bool {
        return (bool) $this->_arrQuery['inclusive_end'] ?? false;
    }

    /**
     * Specifies whether the specified end key should be included in the result. Default is true.
     */
    public function SetInclusiveEnd(bool $value) {
        $this->_arrQuery['inclusive_end'] = $value;
    }

    /**
     * Return only documents that match the specified key.
     *
     * @return null|string
     */
    public function GetKey(): string {
        return (string) $this->_arrJson['key'] ?? null;
    }

    /**
     * Return only documents that match the specified key.
     */
    public function SetKey(string $value) {
        $this->_arrJson['key'] = $value;
    }

    /**
     * Return only documents where the key matches one of the keys specified in the array.
     */
    public function GetKeys(): array {
        return $this->_arrJson['keys'] ?? [];
    }

    /**
     * Return only documents where the key matches one of the keys specified in the array.
     */
    public function SetKeys(array $value) {
        $this->_arrJson['keys'] = $value;
    }

    /**
     * Limit the number of the returned documents to the specified number.
     *
     * @return null|int
     */
    public function GetLimit(): int {
        return $this->_arrQuery['limit'] ?? null;
    }

    /**
     * Limit the number of the returned documents to the specified number.
     */
    public function SetLimit(int $value) {
        $this->_arrQuery['limit'] = $value;
    }

    /**
     * Use the reduction function.
     * Default is true when a reduce function is defined.
     */
    public function GetReduce(): bool {
        return (bool) $this->_arrQuery['reduce'] ?? true;
    }

    /**
     * Use the reduction function.
     * Default is true when a reduce function is defined.
     */
    public function SetReduce(bool $value) {
        $this->_arrQuery['reduce'] = $value;
    }

    /**
     * Skip this number of records before starting to return the results.
     * Default is 0.
     */
    public function GetSkip(): int {
        return $this->_arrQuery['skip'] ?? 0;
    }

    /**
     * Skip this number of records before starting to return the results.
     * Default is 0.
     */
    public function SetSkip(int $value) {
        $this->_arrQuery['skip'] = $value;
    }

    /**
     * Sort returned rows.
     * Setting this to false offers a performance boost. The total_rows and offset fields are not available when this is set to false. Default is true.
     *
     * @see https://docs.couchdb.org/en/stable/api/ddoc/views.html#api-ddoc-view-sorting
     */
    public function GetSorted(): bool {
        return (bool) $this->_arrQuery['sorted'] ?? true;
    }

    /**
     * Sort returned rows.
     * Setting this to false offers a performance boost. The total_rows and offset fields are not available when this is set to false. Default is true.
     *
     * @see https://docs.couchdb.org/en/stable/api/ddoc/views.html#api-ddoc-view-sorting
     */
    public function SetSorted(bool $value) {
        $this->_arrQuery['sorted'] = $value;
    }

    /**
     * Whether or not the view results should be returned from a stable set of shards.
     * Default is false.
     */
    public function GetStable(): bool {
        return (bool) $this->_arrQuery['stable'] ?? false;
    }

    /**
     * Whether or not the view results should be returned from a stable set of shards.
     * Default is false.
     */
    public function SetStable(bool $value) {
        $this->_arrQuery['stable'] = $value;
    }

    /**
     * Return records starting with the specified key.
     */
    public function GetStartKey(): string {
        return $this->_arrJson['start_key'] ?? null;
    }

    /**
     * Return records starting with the specified key.
     */
    public function SetStartKey(string $value) {
        $this->_arrJson['start_key'] = $value;
    }

    /**
     * Return records starting with the specified document ID.
     * Ignored if startkey is not set.
     */
    public function GetStartKeyDocId(): string {
        return $this->_arrQuery['start_key_doc_id'] ?? null;
    }

    /**
     * Return records starting with the specified document ID.
     * Ignored if startkey is not set.
     */
    public function SetStartKeyDocId(string $value) {
        $this->_arrQuery['start_key_doc_id'] = $value;
    }

    /**
     * Whether or not the view in question should be updated prior to responding to the user.
     * Supported values: true,false,lazy. Default is true.
     */
    public function GetUpdate(): string {
        return $this->_arrQuery['update'] ?? 'true';
    }

    /**
     * Whether or not the view in question should be updated prior to responding to the user.
     * Supported values: true,false,lazy. Default is true.
     */
    public function SetUpdate(string $value) {
        $this->_arrQuery['update'] = $value;
    }

    /**
     * Whether to include in the response an update_seq value indicating the sequence id of the database the view reflects.
     * Default is false.
     */
    public function GetUpdateSeq(): bool {
        return (bool) $this->_arrQuery['update_seq'] ?? false;
    }

    /**
     * Whether to include in the response an update_seq value indicating the sequence id of the database the view reflects.
     * Default is false.
     */
    public function SetUpdateSeq(bool $value) {
        $this->_arrQuery['update_seq'] = $value;
    }
}
