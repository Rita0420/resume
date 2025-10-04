<?php
session_start();
date_default_timezone_set("Asia/Taipei");

function dd($data){
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

function to($url){
    header("location:".$url);
}

function q($sql){
    $dsn="mysql:host=localhost;dbname=s1140209;charset=utf8";
    $pdo=new PDO($dsn,'s1140209','s1140209');
    // $dsn="mysql:host=localhost;dbname=msgo;charset=utf8";
    // $pdo=new PDO($dsn,'root','');
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

class DB{
    private $table;
    private $dsn="mysql:host=localhost;dbname=s1140209;charset=utf8";
    // private $dsn="mysql:host=localhost;dbname=msgo;charset=utf8";
    private $pdo;

    function __construct($table)
    {
        $this->table=$table;
        $this->pdo=new PDO($this->dsn,'s1140209','s1140209');
        // $this->pdo=new PDO($this->dsn,'root','');
    }

    function all(...$arg){
        $sql="select * from $this->table ";
        if(isset($arg[0])){
            if(is_array($arg[0])){
                $tmp=$this->array2sql($arg[0]);
                $sql .=" where ".join(" and ",$tmp);
            }else{
                $sql .=$arg[0];
            }
        }
        if(isset($arg[1])){
            $sql .=$arg[1];
        }
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    function count(...$arg){
        $sql="select count(*) from $this->table ";
        if(isset($arg[0])){
            if(is_array($arg[0])){
                $tmp=$this->array2sql($arg[0]);
                $sql .=" where ".join(" and ",$tmp);
            }else{
                $sql .=$arg[0];
            }
        }
        if(isset($arg[1])){
            $sql .=$arg[1];
        }
        return $this->pdo->query($sql)->fetchColumn();
    }

    function sum($cols,...$arg){
        $sql="select sum($cols) from $this->table ";
        if(isset($arg[0])){
            if(is_array($arg[0])){
                $tmp=$this->array2sql($arg[0]);
                $sql .=" where ".join(" and ",$tmp);
            }else{
                $sql .=$arg[0];
            }
        }
        if(isset($arg[1])){
            $sql .=$arg[1];
        }
        return $this->pdo->query($sql)->fetchColumn();
    }

    function find($id){
        $sql="select * from $this->table ";
        
            if(is_array($id)){
                $tmp=$this->array2sql($id);
                $sql .=" where ".join(" and ",$tmp);
            }else{
                $sql .=" where `id`='$id'";
            }
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    function save($array){
        if(isset($array['id'])){
            $sql="update $this->table set ";
            $tmp=$this->array2sql($array);
            $sql .=join(" , ",$tmp)." where `id`='{$array['id']}'";
        }else{
            $cols=join("`,`",array_keys($array));
            $values=join("','",$array);

            $sql="insert into $this->table (`$cols`) values('$values')";
        }
        return $this->pdo->exec($sql);
    }

    function del($id){
        $sql="delete from $this->table ";
        
            if(is_array($id)){
                $tmp=$this->array2sql($id);
                $sql .=" where ".join(" and ",$tmp);
            }else{
                $sql .=" where `id`='$id'";
            }
        return $this->pdo->exec($sql);
    }

    function array2sql($array){
        $tmp=[];
        foreach($array as $key => $value){
            $tmp[]="`$key`='$value'";
        }
        return $tmp;
    }
}

$Card=new DB('msgo_card');
$More=new DB('msgo_more');
$Carousel=new DB('msgo_carousel');
$User=new DB('msgo_user');
// $Card=new DB('card');
// $More=new DB('more');
// $Carousel=new DB('carousel');
// $User=new DB('user');