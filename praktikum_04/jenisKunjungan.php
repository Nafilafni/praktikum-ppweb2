<?php

class jenisKunjungan {
    public $id;
    public $name;
    public $display_name;

    // Updated the connect method to return the connection resource
    private static function connect() {
        $conn = mysqli_connect("localhost", "root", "", "bukutamu");

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        return $conn;
    }

    public static function getAll() {
        $conn = self::connect();

        $query = "SELECT * FROM jenis_kunjungan";
        // Execute the query
        $result = mysqli_query($conn, $query);

        // Check if the query was successful
        if (!$result) {
            die("Query failed: " . mysqli_error($conn));
        }

        $entries = [];
        // Fetch results as associative array
        while ($row = mysqli_fetch_assoc($result)) {
            $entry = new jenisKunjungan();
            $entry->id = $row['id'];
            $entry->name = $row['name'];
            $entry->display_name = $row['display_name'];

            array_push($entries, $entry);
        }

        // Free result set
        mysqli_free_result($result);
        // Close the connection
        mysqli_close($conn);

        return $entries;
    }
}