<?php 

class Value
{
    public function createValue($data, $conn) 
    {            
        $data = [
            'val' => $data['value-name'],
            'col' => $data['value-color'],
            'ico' => $data['value-icon']
        ];
        $sql = "INSERT INTO valores VALUES (null, :val, :col, :ico, null);";
        $stmt = $conn->prepare($sql);
        
        return ($stmt->execute($data)) ? 'value added' : 'value error';
    }

    public function thereAreValues ($conn) 
    {
        $sql = "SELECT COUNT(valorNombre) vals FROM valores";
        $stmt = $conn->query($sql);
        $row = $stmt->fetch();
        if ($stmt->rowCount() > 0) {
            return $row['vals'];
        } else {
            return 0;
        }
    }

    public function getValues ($conn) 
    {
        $sql = "SELECT * FROM valores";
        $stmt = $conn->query($sql);

        return $stmt;
    }

}

?>