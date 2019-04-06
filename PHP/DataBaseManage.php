<?php
/**
 * Created by PhpStorm.
 * User: Fun
 * Date: 2019/3/24
 * Time: 11:06
 */

class DataBaseManage
{
    private $host;                  //主机名
    private $username;              //数据库用户名
    private $password;              //数据库密码
    private $connObject;              //数据库连接标志
    private $result;                //Sql语句查询结果
    private $row;                   //Sql语句查询结果
    private $coding;                //数据库编码设置

    public function __construct($host,$password,$coding,$username)
    {
        $this->host = $host;
        $this->password = $password;
        $this->coding = $coding;
        $this->username = $username;
    }
    public function selectAll($databasename,$tablename)
    {
        $sql = "use ".$databasename.";";
        if(mysqli_query($this->connObject,$sql))
        {
            $sql = "select * from ".$tablename.";";
            $this->result = mysqli_query($this->connObject,$sql);
            $this->row = mysqli_num_rows($this->result);
            echo $this->row;
            if($this->row > 0)
            {
                while($row = mysqli_fetch_assoc($this->result)) {
                    echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
                }
            }
        }
    }
    public function connect($Database_name)
    {
        $this->connObject = mysqli_connect($this->host,$this->username,$this->password);
        if($this->connObject->connect_error)
        {
            return false;
        }
        else
        {
            $sql = "use ".$Database_name.";";
            if(mysqli_query($this->connObject,$sql))
            {
                return true;
            }
        }
    }
    public function createDatabase($databasename)
    {
        $sql ='create database ' . $databasename.";";
        if(mysqli_query($this->connObject,$sql))
        {
            echo "create success!";
        }
        else
        {
            echo "create failure!";
        }
    }
    public function dropDatabase($databasename)
    {
        $sql ="drop database ". $databasename.";";
        if(mysqli_query($this->connObject,$sql))
        {
            echo "drop database success!";
        }
        else
        {
            echo "drop database failure!";
        }
    }
    public function droptable($tablename)
    {
        $sql ="drop table " . $tablename.";";
        if(mysqli_query($this->connObject,$sql))
        {
            echo "'drop table success!'";
        }
        else
        {
            echo "'drop table failure!'";
        }
    }
    public function CreateTable($table_name,$content_First,$table_rowlen)
    {
        $sql = "";
        for($index=0;$index<$table_rowlen;$index++)
        {
            if($index==0)
            {
                $sql = "create table ".$table_name."(".$content_First[$index]." ".$this->SQLDataType($content_First[$index])." PRIMARY KEY,";
            }
            else if(($table_name != '老师')&&($table_name != '学生')&&$index==$table_rowlen-1)
            {
                $sql.= $content_First[$index]." ".$this->SQLDataType($content_First[$index])." NOT NULL);";
            }
            else
            {
                $sql.= $content_First[$index]." ".$this->SQLDataType($content_First[$index])." NOT NULL,";
            }
        }
        //echo $sql;
        if($table_name == '老师'|| $table_name == '学生')
        {
            $sql.= "密码  VARCHAR(20) NOT NULL);";
        }
        if(mysqli_query($this->connObject,$sql))
        {
            echo "建表成功";
            return true;
        }
        else
        {
            return false;
        }
    }
    public function ExcelToTable($table_name,$table_content,$table_rowlen)
    {
        $sql = "";
        $temp = "";
        //if($this->CreateTable($table_name,$table_content[1],$table_rowlen))
        {
            for($index = 2;$index<count($table_content);$index++)
            {
                $temp = "INSERT INTO ".$table_name." VALUES"."( ";
                for($indexJ = 0;$indexJ<$table_rowlen;$indexJ++)
                {
                    $temp.=$table_content[$index][$indexJ].",";
                }
                $temp.="123456);";
                $sql.=$temp;
            }
            echo $sql;

        //}
       // else
      //  {
       //     echo "dasdasda";
        }

    }
    public function SQLDataType($SQLData)
    {
        $type = gettype($SQLData);
        $return_SQL = "";
        switch ($type)
        {
            case 'integer':
                $return_SQL = " INT(10)";
                break;
            case 'float':
                $return_SQL = " FLOAT(4)";
                break;
            case 'string':
                $return_SQL = " VARCHAR(20)";
                break;
            default:
                break;
        }
        if($SQLData=="性别")
        {
            $return_SQL = " VARCHAR(4)";
        }
        return $return_SQL;
    }
    public function Login($ID_Name,$Password,$IsTeacher)
    {
        $type = gettype($ID_Name);
        if($IsTeacher)
        {
            if($type == integer)
            {
                $return_SQL = "select 教师号,密码 from 老师 where 教师号 = ".$ID_Name;
                $this->result = mysqli_query($this->connObject,$return_SQL);
                $this->row = mysqli_num_rows($this->result);
                if($this->row == 0)
                {
                    return -1;
                }
                else
                {
                    while($row = $this->result->fetch_assoc())
                    {
                        if($row["密码"] == $Password)
                        {
                            return 1;
                        }
                        else
                        {
                            return 0;
                        }
                    }
                }
            }
            else
            {
                $return_SQL = "select 教师姓名,密码 from 老师 where 教师姓名 = ".$ID_Name;
                $this->result = mysqli_query($this->connObject,$return_SQL);
                $this->row = mysqli_num_rows($this->result);
                if($this->row == 0)
                {
                    return -1;
                }
                else
                {
                    while($row = $this->result->fetch_assoc())
                    {
                        if($row["密码"] == $Password)
                        {
                            return 1;
                        }
                        else
                        {
                            return 0;
                        }
                    }
                }
            }
        }
        else
        {
            if($type == integer)
            {
                $return_SQL = "select 学号,密码 from 学生 where 学号 = ".$ID_Name;
                $this->result = mysqli_query($this->connObject,$return_SQL);
                $this->row = mysqli_num_rows($this->result);
                if($this->row == 0)
                {
                    return -1;
                }
                else
                {
                    while($row = $this->result->fetch_assoc())
                    {
                        if($row["密码"] == $Password)
                        {
                            return 1;
                        }
                        else
                        {
                            return 0;
                        }
                    }
                }
            }
            else
            {
                $return_SQL = "select 姓名,密码 from 学生 where 姓名 = ".$ID_Name;
                $this->result = mysqli_query($this->connObject,$return_SQL);
                $this->row = mysqli_num_rows($this->result);
                if($this->row == 0)
                {
                    return -1;
                }
                else
                {
                    while($row = $this->result->fetch_assoc())
                    {
                        if($row["密码"] == $Password)
                        {
                            return 1;
                        }
                        else
                        {
                            return 0;
                        }
                    }
                }
            }
        }

    }
}