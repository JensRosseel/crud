<?php

// This class is focussed on dealing with queries for one type of data
// That allows for easier re-using and it's rather easy to find all your queries
// This technique is called the repository pattern
class CardRepository
{
    private $databaseManager;

    // This class needs a database connection to function
    public function __construct(DatabaseManager $databaseManager)
    {
        $this->databaseManager = $databaseManager;
    }

    public function create(string $name, string $cardtype, string $rarity)
    {
        $sql = "SELECT name FROM cardcollection WHERE name = '{$name}'";
        $control = $this->databaseManager->connect()->query($sql);
        if($sql == $control)
        {
            echo "<script> alert('This card is already in the database.'); </script>";
        }
        else if($name == '' || $cardtype == '' || $rarity == '')
        {
            echo "<script> alert('All boxes must be filled.'); </script>";
        }
        else
        {
            $sql = "INSERT INTO cardcollection (name, cardtype, rarity) VALUES ('{$name}', '{$cardtype}', '{$rarity}');";
            $this->databaseManager->connect()->query($sql);

            echo "<script> alert('Card has been added to the database.'); </script>";
        }
    }

    // Get one
    public function find()
    {

    }

    // Get all
    public function get()
    {
        // replace dummy data by real one
        $sql = "SELECT * FROM cardcollection";
        $result = $this->databaseManager->connect()->query($sql);

        return $result;

        // We get the database connection first, so we can apply our queries with it
        // return $this->databaseManager->connection-> (runYourQueryHere)
    }

    public function update(string $name = '', string $cardtype = '', string $rarity = '')
    {
        if($name == '')
        {
            if($cardtype == '')
            {
                if($rarity != '')
                {
                     $sql = "UPDATE cardcollection SET rarity = '{$rarity}' WHERE name = '{$_GET['edit']}'";
                }
            }
            else
            {
                if($rarity != '')
                {
                     $sql = "UPDATE cardcollection SET rarity = '{$rarity}', cardtype = '{$cardtype}' WHERE name = '{$_GET['edit']}'";
                }
                else
                {
                     $sql = "UPDATE cardcollection SET cardtype = '{$cardtype}' WHERE name = '{$_GET['edit']}'";
                }
            }
        }
        else
        {
            if($cardtype == '')
            {
                if($rarity != '')
                {
                     $sql = "UPDATE cardcollection SET name = '{$name}', rarity = '{$rarity}' WHERE name = '{$_GET['edit']}'";
                }
                else
                {
                    $sql = "UPDATE cardcollection SET name = '{$name}' WHERE name = '{$_GET['edit']}'";
                }
            }
            else
            {
                if($rarity != '')
                {
                     $sql = "UPDATE cardcollection SET name = '{$name}', rarity = '{$rarity}', cardtype = '{$cardtype}' WHERE name = '{$_GET['edit']}'";
                }
                else
                {
                     $sql = "UPDATE cardcollection SET name = '{$name}', cardtype = '{$cardtype}' WHERE name = '{$_GET['edit']}'";
                }
            }
        }

        $this->databaseManager->connect()->query($sql);
        echo "<script> alert('Changes have been made')</script>";
    }

    public function delete()
    {

    }

}