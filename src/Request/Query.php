<?php

namespace AgileBM\PhpCouchDb\Request;

class Query {
    const FEED_PARAMETER_NORMAL = 'normal'; // Returns all historical DB changes, then closes the connection
    const FEED_PARAMETER_LONGPOLL = 'longpoll'; // Closes the connection after the first event.
    const FEED_PARAMETER_CONTINUOUS = 'continuous'; // Send a line of JSON per event. Keeps the socket open until timeout
    const FEED_PARAMETER_EVENTSOURCE = 'eventsource'; // Like, continuous, but sends the events in EventSource format

    const STYLE_MAIN_ONLY = 'main_only'; //will only return the current “winning” revision
    const STYLE_ALL_DOCS = 'all_docs'; // will return all leaf revisions (including conflicts and deleted former conflicts)

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
     * Includes information about deleted conflicted revisions
     * Default false
     */
    public function GetDeletedConflicts(): bool {
        return (bool) $this->_arrQuery['deleted_conflicts'] ?? false;
    }

    /**
     * Includes information about deleted conflicted revisions
     * Default false
     */
    public function SetDeletedConflicts(bool $value) {
        $this->_arrQuery['deleted_conflicts'] = $value;
    }

    /**
     * Forces retrieving latest “leaf” revision, no matter what rev was requested
     * Default false
     */
    public function GetLatest(): bool {
        return (bool) $this->_arrQuery['latest'] ?? false;
    }

    /**
     * Forces retrieving latest “leaf” revision, no matter what rev was requested
     * Default false
     */
    public function SetLatest(bool $value) {
        $this->_arrQuery['latest'] = $value;
    }

    /**
     * Includes last update sequence for the document
     * Default false
     */
    public function SetLocalSequence(bool $value) {
        $this->_arrQuery['local_seq'] = $value;
    }
    /**
     * Includes last update sequence for the document
     * Default false
     */
    public function GetLocalSequence(): bool {
        return (bool) $this->_arrQuery['local_seq'] ?? false;
    }

    /**
     * Retrieves documents of specified leaf revisions
     * use 'all' to return all leaf revisions
     */
    public function SetOpenRevs(array $value) {
        $this->_arrQuery['open_revs'] = $value;
    }
    /**
     * Retrieves documents of specified leaf revisions
     * use 'all' to return all leaf revisions
     */
    public function GetOpenRevs(): array {
        return (array) $this->_arrQuery['open_revs'] ?? null;
    }

    /**
     * Retrieves document of specified revision
     */
    public function SetRev(string $value) {
        $this->_arrQuery['rev'] = $value;
    }
    /**
     * Retrieves document of specified revision
     */
    public function GetRev(): string {
        return (string) $this->_arrQuery['rev'] ?? null;
    }

    /**
     * Includes list of all known document revisions
     * Default false
     */
    public function SetRevs(bool $value) {
        $this->_arrQuery['revs'] = $value;
    }
    /**
     * Includes list of all known document revisions
     * Default false
     */
    public function GetRevs(): bool {
        return (bool) $this->_arrQuery['revs'] ?? false;
    }

    /**
     * Includes detailed information for all known document revisions
     * Default false
     */
    public function SetRevsInfo(bool $value) {
        $this->_arrQuery['revs_info'] = $value;
    }
    /**
     * Includes detailed information for all known document revisions
     * Default false
     */
    public function GetRevsInfo(): bool {
        return (bool) $this->_arrQuery['revs_info'] ?? false;
    }

    /**
     * Acts same as specifying all conflicts, deleted_conflicts and revs_info query parameters
     * Default false
     */
    public function GetMeta(): bool {
        return (bool) $this->_arrQuery['meta'] ?? false;
    }

    /**
     * Acts same as specifying all conflicts, deleted_conflicts and revs_info query parameters
     * Default false
     */
    public function SetMeta(bool $value) {
        $this->_arrQuery['meta'] = $value;
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
     * Prevents insertion of a conflicting document.
     * If false, a well-formed _rev must be included in the document
     * Default true
     */
    public function GetNewEdits(): bool {
        return (bool) $this->_arrQuery['new_edits'] ?? true;
    }

    /**
     * Prevents insertion of a conflicting document.
     * If false, a well-formed _rev must be included in the document
     * Default true
     */
    public function SetNewEdits(bool $value) {
        $this->_arrQuery['new_edits'] = $value;
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
     * Includes attachments only since specified revisions
     */
    public function GetAttsSince(): array {
        return $this->_arrQuery['atts_since'] ?? [];
    }

    /**
     * Includes attachments only since specified revisions
     */
    public function SetAttsSince(array $value) {
        $this->_arrQuery['atts_since'] = $value;
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
     * Stores document in batch mode. Possible values: ok
     */
    public function GetBatchMode(): string {
        return (string) $this->_arrQuery['batch'] ?? null;
    }

    /**
     * Stores document in batch mode. Possible values: ok
     */
    public function SetBatch(bool $value) {
        if ($value) {
            $this->_arrQuery['batch'] = 'ok';
        }
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

    // API of Updates need this query parameter 
    /**
     * How to return the updates  
     * Default is normal (FEED_PARAMETER_NORMAL)
     */
    public function GetFeed(): string {
        return $this->_arrQuery['feed'] ?? self::FEED_PARAMETER_NORMAL;
    }
    
    /**
     * How to return the updates  
     * Default is normal (FEED_PARAMETER_NORMAL)
     */
    public function SetFeed(string $value) {
        $this->_arrQuery['feed'] = $value;
    }

    /**
     * Number of milliseconds until CouchDB closes the connection.
     * Default is 
     */
    public function GetTimeout(): int {
        return $this->_arrQuery['timeout'] ?? 60000;
    }

    /**
     * Number of milliseconds until CouchDB closes the connection.
     * Default is 60000
     */
    public function SetTimeout(int $value) {
        $this->_arrQuery['timeout'] = $value;
    }

    /**
     * List of document IDs to filter the changes feed as valid JSON array.
     */
    public function GetDocIDs(): array {
        return $this->_arrJson['doc_ids'] ?? null;
    }

    /**
     * List of document IDs to filter the changes feed as valid JSON array.
     */
    public function SetDocIDs(array $value) {
        $this->_arrJson['doc_ids'] = $value;
    }
    
    /**
     * Period in milliseconds after which an empty line is sent in the results
     * Default is 60000
     * Only applicable for longpoll, continuous, and eventsource feeds. Overrides any timeout to keep the feed alive indefinitely
     */
    public function GetHeartbeat (): int {
        return $this->_arrQuery['heartbeat'] ?? 60000;
    }

    /**
     * Period in milliseconds after which an empty line is sent in the results
     * Default is 60000
     * Only applicable for longpoll, continuous, and eventsource feeds. Overrides any timeout to keep the feed alive indefinitely
     */
    public function SetHeartbeat (int $value) {
        $this->_arrQuery['heartbeat'] = $value;
    }

    /**
     * Return only updates since the specified sequence ID 
     * If the sequence ID is specified but does not exist, all changes are returned
     * use 'now' to begin showing only new updates.
     */
    public function GetSince(): string {
        return $this->_arrQuery['since'] ?? null;
    }
    
    /**
     * Return only updates since the specified sequence ID
     * If the sequence ID is specified but does not exist, all changes are returned
     * use 'now' to begin showing only new updates.
     */
    public function SetSince(string $value) {
        $this->_arrQuery['since'] = $value;
    }
    /**
     * ID of the last events received by the server on a previous connection
     */
    public function GetLastEventID(): int {
        return $this->_arrQuery['last-event-id'] ?? null;
    }
    
    /**
     * ID of the last events received by the server on a previous connection
     * 
     */
    public function SetLastEventID(int $value) {
        $this->_arrQuery['last-event-id'] = $value;
    }

    /**
     * Specifies how many revisions are returned in the changes array
     * Default main_only
     */
    public function GetStyle(): string {
        return $this->_arrQuery['style'] ?? 'main_only';
    }
    
    /**
     * Specifies how many revisions are returned in the changes array
     * Default main_only
     */
    public function SetStyle(string $value) {
        $this->_arrQuery['style'] = $value;
    }

    /**
     * When fetching changes in a batch, setting the seq_interval parameter tells CouchDB to 
     * only calculate the update seq with every Nth result returned
     */
    public function GetSeqInterval(): int {
        return $this->_arrQuery['seq_interval'] ?? null;
    }
    
    /**
     * When fetching changes in a batch, setting the seq_interval parameter tells CouchDB to 
     * only calculate the update seq with every Nth result returned
     */
    public function SetSeqInterval(int $value) {
        $this->_arrQuery['seq_interval'] = $value;
    }

    /**
     * When fetching changes in a batch, setting the filter parameter tells CouchDB to 
     * only calculate the update seq with every Nth result returned
     */
    public function GetFilter(): string {
        return $this->_arrQuery['filter'] ?? null;
    }
    
    /**
     * When fetching changes in a batch, setting the filter parameter tells CouchDB to 
     * only calculate the update seq with every Nth result returned
     */
    public function SetFilter(string $value) {
        $this->_arrQuery['filter'] = $value;
    }

    /**
     * When fetching changes in a batch, setting the filter parameter tells CouchDB to 
     * only calculate the update seq with every Nth result returned
     */
    public function SetSelector(array $value) {
        $this->_arrQuery['selector'] = $value;
    }

    /**
     * When fetching changes in a batch, setting the Selector parameter tells CouchDB to 
     * only calculate the update seq with every Nth result returned
     */
    public function GetSelector(): array {
        return $this->_arrQuery['selector'] ?? null;
    }
}
