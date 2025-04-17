<?php

interface DataSource {
    public function read_data(): string;
}

class FileDataSource implements DataSource {
    private $file_path;

    public function __construct(string $file_path) {
        $this->file_path = $file_path;
    }

    public function read_data(): string {
        return file_get_contents($this->file_path);
    }
}

class DatabaseDataSource {
    private $connection_string;

    public function __construct(string $connection_string) {
        $this->connection_string = $connection_string;
    }

    public function fetch_data(): string {
        return 'Данные из базы данных';
    }
}

class DatabaseAdapter implements DataSource {
    private $database_data_source;

    public function __construct(DatabaseDataSource $database_data_source) {
        $this->database_data_source = $database_data_source;
    }

    public function read_data(): string {
        return $this->database_data_source->fetch_data();
    }
}

$fileDataSource = new FileDataSource('/data.txt');
$fileData = $fileDataSource->read_data();
echo "Данные из файла: " . $fileData . PHP_EOL;


$databaseDataSource = new DatabaseDataSource('connection_string_here');
$databaseAdapter = new DatabaseAdapter($databaseDataSource);
$databaseData = $databaseAdapter->read_data();
echo "Данные из базы данных: " . $databaseData . PHP_EOL;

?>