<?php

namespace App;

class DbWriter implements WriterInterface
{
    private object $connect;


    public function __construct()
    {
        $this->connect = self::getConnectionToDataBase();
    }

    // можно было создать отдельный класс подключения к безе, решил пока не делать, так как есть другая задача.

    public function getConnectionToDataBase()
    {
        $connect = mysqli_connect('127.0.0.1', 'root', 'root', 'logger-test');
        if (!$connect) {
            echo '<h4> Error connection dataBase!</h4>';
            return;
        }

        return $connect;
    }

    public function write($data)
    {
        $dataArray = explode(' - ', $data);

        $value1 = $dataArray[0];
        $value2 = $dataArray[1];
        $value3 = $dataArray[2];
        $value4 = $dataArray[3];

        $sql = "INSERT INTO `logs` (`id`, `date`, `level`, `message`, `content`) VALUES (NULL, '$value1', '$value2', '$value3', '$value4')";

        mysqli_query($this->connect, $sql);
    }
}