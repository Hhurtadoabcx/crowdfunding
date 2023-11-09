
<?php
use Kreait\Firebase\Factory;

class FirebaseAdapter implements DatabaseAdapter
{
    private $firestore;

    public function __construct(Factory $factory)
    {
        $this->firestore = $factory->createFirestore();
    }

    public function create($data)
    {
        // Lógica específica de Firebase para crear un registro
        $this->firestore->collection('proyectista')->add($data);
    }

    public function getAll()
    {
        // Lógica específica de Firebase para obtener todos los registros
        // ...
    }
}



?>
