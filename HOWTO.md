Additional Information

## .env-variables

```bash
    cp env.local .env
```

## tools

* league/csv: simple csv library. already required in the `composer.json`.  Look [here](https://csv.thephpleague.com/) for documentation.

  ```php
    use League\Csv\Reader;

    $csv = Reader::createFromPath('/path/to/your/csv/file.csv', 'r');
    $csv->setHeaderOffset(0);

    $header = $csv->getHeader(); //returns the CSV header record

    //returns all the records as
    $records = $csv->getRecords(); // an Iterator object containing arrays
    $records = $csv->getRecordsAsObject(MyDTO::class); //an Iterator object containing MyDTO objects

    echo $csv->toString(); //returns the CSV document as a string
    ```

  ```php
    use League\Csv\Writer;

    $header = ['first name', 'last name', 'email'];
    $records = [
        [1, 2, 3],
        ['foo', 'bar', 'baz'],
        ['john', 'doe', 'john.doe@example.com'],
    ];

    //load the CSV document from a string
    $csv = Writer::createFromString();

    //insert the header
    $csv->insertOne($header);

    //insert all the records
    $csv->insertAll($records);

    echo $csv->toString(); //returns the CSV document as a string
    ```

