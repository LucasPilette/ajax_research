<?php 

require_once(dirname(__FILE__).'/../config/pdo.php');

class City{
    private $id;
    private $name;
    private $zipcode;
    private object $pdo;

    public function __construct(int $id, string $name, string $zipcode)
    {
        $this->id = $id;
        $this->name = $name;
        $this->zipcode = $zipcode;
        $this->_pdo = DataBase::getInstance();
    }


    public static function getAll($search = ''):array{
        try{
            $sql = 'SELECT * FROM `cities` 
            WHERE `zipcode` LIKE :search
            LIMIT 20';
            $sth = Database::getInstance()->prepare($sql);
            $sth->bindValue(':search',$search,PDO::PARAM_STR);
            $result = $sth->execute();

            if($result == false){
                throw new PDOException();
            } else {
                return($sth->fetchAll());
            }
        } catch(PDOException $ex){

        }
    }
}