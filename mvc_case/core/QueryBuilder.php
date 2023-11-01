<?php
trait QueryBuilder
 {

    public $tableName = '';
    public $where = '';
    public $operator = '';
    public $selectField = '*';
    public $limit = '';
    public $orderBy = '';
    public $innerJoin = '';
    private $sqlPaginate = '';
    private $resetQuery = true;

    public function table( $tableName )
 {
        $this->tableName = $tableName;
        return $this;
    }

    public function where( $field, $compare = null, $value = null )
 {
        if ( $field instanceof \Closure ) {
            $callback = $field;
            $this->where .= '(';
            call_user_func_array( $callback, [ $this ] );
            $this->where .= ')';
        } else {
            if ( empty( $this->where ) ) {
                $this->operator = ' WHERE ';
            } else {
                $this->operator = ' AND ';

            }
            $this->where .= "$this->operator $field $compare '$value'";
            $this->where = str_replace( '( AND', 'AND (', $this->where );
        }

        return $this;
    }

    public function orWhere( $field, $compare, $value )
 {
        if ( $field instanceof \Closure ) {
            $callback = $field;
            $this->where .= '(';
            call_user_func_array( $callback, [ $this ] );
            $this->where .= ')';

        } else {
            if ( empty( $this->where ) ) {
                $this->operator = ' WHERE ';
            } else {
                $this->operator = ' OR ';
            }

            $this->where .= "$this->operator $field $compare '$value'";
            $this->where = str_replace( '( OR', 'OR (', $this->where );

        }

        return $this;
    }

    public function whereLike( $field, $value )
 {

        if ( empty( $this->where ) ) {
            $this->operator = ' WHERE ';
        } else {
            $this->operator = ' AND ';
        }
        $this->where .= "$this->operator $field LIKE '$value'";

        return $this;
    }

    public function select( $field = '*' )
 {
        $this->selectField = $field;
        return $this;
    }

    public function limit( $number, $offset = 0 )
 {
        $this->limit = "LIMIT $offset, $number";
        return $this;
    }

    /*ORDER BY id DESC
    $this->db->orderBy( 'id', 'DESC' )
    $this->db->orderBy( 'id ASC, name DESC' );
    */

    public function orderBy( $field, $type = 'ASC' )
 {
        $fieldArr = array_filter( explode( ',', $field ) );
        if ( !empty( $fieldArr ) && count( $fieldArr ) >= 2 ) {
            //SQL order by multi
            $this->orderBy = 'ORDER BY ' . implode( ', ', $fieldArr );
        } else {
            $this->orderBy = 'ORDER BY ' . $field . ' ' . $type;
        }

        return $this;
    }

    public function get()
 {
        $sqlQuery = "SELECT $this->selectField FROM $this->tableName $this->innerJoin $this->where $this->orderBy $this->limit";
        $sqlQuery = trim( $sqlQuery );

        $this->sqlPaginate = "SELECT $this->selectField FROM $this->tableName $this->innerJoin $this->where";
        $this->sqlPaginate = trim( $this->sqlPaginate );

        $query = $this->query( $sqlQuery );

        //Reset field
        if ( $this->resetQuery ) {
            $this->resetQuery();
        }

        if ( !empty( $query ) ) {

            return $query->fetchAll( PDO::FETCH_ASSOC );
        }
        return false;
    }

    public function paginate( $limit, $isQuery = true )
 {

        $request = new Request();
        $fields = $request->getFields();
        $page = !empty( $fields[ 'page' ] ) ? $fields[ 'page' ] : 1;
        $offset = ( $page - 1 ) * $limit;
        $this->resetQuery = false;
        $result = $this->limit( $limit, $offset )->get();
        $query = $this->query( $this->sqlPaginate );
        $paginateView = Paginate::render( $query, $limit, $page, $isQuery );

        $this->resetQuery();
        $this->resetQuery = true;
        return [
            'data' => $result,
            'link' => $paginateView,
        ];
    }

    //Inner join

    public function join( $tableName, $relationship )
 {
        $this->innerJoin .= 'INNER JOIN ' . $tableName . ' ON ' . $relationship . ' ';
        return $this;
    }

    //Insert

    public function insert( $data )
 {
        $tableName = $this->tableName;
        $insertStatus = $this->insertData( $tableName, $data );
        return $insertStatus;
    }

    //LastId

    public function lastId()
 {
        return $this->lastInsertId();
    }

    //Update

    public function update( $data )
 {
        $whereUpdate = str_replace( 'WHERE', '', $this->where );
        $whereUpdate = trim( $whereUpdate );
        $tableName = $this->tableName;
        $statusUpdate = $this->updateData( $tableName, $data, $whereUpdate );
        return $statusUpdate;
    }

    //Delete

    public function delete()
 {
        $whereDelete = str_replace( 'WHERE', '', $this->where );
        $whereDelete = trim( $whereDelete );
        $tableName = $this->tableName;

        $statusDelete = $this->deleteData( $tableName, $whereDelete );
        return $statusDelete;
    }

    public function first()
 {
        $sqlQuery = "SELECT $this->selectField FROM $this->tableName $this->where $this->limit";

        $query = $this->query( $sqlQuery );

        //Reset field
        $this->resetQuery();

        if ( !empty( $query ) ) {

            return $query->fetch( PDO::FETCH_ASSOC );
        }
        return false;
    }

    public function resetQuery()
 {
        $this->tableName = '';
        $this->where = '';
        $this->operator = '';
        $this->selectField = '*';
        $this->limit = '';
        $this->orderBy = '';
        $this->innerJoin = '';
        $this->sqlPaginate = '';
    }

}