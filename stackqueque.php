<?php
// === Kelas Stack ===
class Stack {
    private $items = [];

    public function push($item) {
        array_push($this->items, $item);
    }

    public function pop() {
        if ($this->isEmpty()) {
            return "Stack kosong!";
        }
        return array_pop($this->items);
    }

    public function peek() {
        return end($this->items);
    }

    public function isEmpty() {
        return empty($this->items);
    }

    public function display() {
        return array_reverse($this->items);
    }
}

// === Kelas Queue ===
class Queue {
    private $items = [];

    public function enqueue($item) {
        array_push($this->items, $item);
    }

    public function dequeue() {
        if ($this->isEmpty()) {
            return "Queue kosong!";
        }
        return array_shift($this->items);
    }

    public function front() {
        return reset($this->items);
    }

    public function isEmpty() {
        return empty($this->items);
    }

    public function display() {
        return $this->items;
    }
}

// === Proses Form ===
$hasil = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mode = $_POST['mode']; // stack atau queue
    $namaList = explode(",", $_POST['nama']); // Pisahkan berdasarkan koma
    $hasil .= "<h3>Mode: " . strtoupper($mode) . "</h3>";

    if ($mode == 'stack') {
        $obj = new Stack();
        foreach ($namaList as $n) {
            $obj->push(trim($n));
        }

        $hasil .= "<p><b>Isi Stack (LIFO):</b> " . implode(", ", $obj->display()) . "</p>";
        $hasil .= "<p>Elemen Teratas: " . $obj->peek() . "</p>";
        $hasil .= "<p>Pop (menghapus yang terakhir datang): " . $obj->pop() . "</p>";
        $hasil .= "<p><b>Isi Stack Sekarang:</b> " . implode(", ", $obj->display()) . "</p>";

    } elseif ($mode == 'queue') {
        $obj = new Queue();
        foreach ($namaList as $n) {
            $obj->enqueue(trim($n));
        }

        $hasil .= "<p><b>Isi Queue (FIFO):</b> " . implode(", ", $obj->display()) . "</p>";
        $hasil .= "<p>Elemen Pertama: " . $obj->front() . "</p>";
        $hasil .= "<p>Dequeue (menghapus yang datang pertama): " . $obj->dequeue() . "</p>";
        $hasil .= "<p><b>Isi Queue Sekarang:</b> " . implode(", ", $obj->display()) . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Simulasi Stack & Queue</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }
        form {
            background: #f8f8f8;
            padding: 20px;
            border-radius: 10px;
            width: 450px;
        }
        input, select, button {
            margin: 6px 0;
            padding: 8px;
            width: 100%;
        }
        button {
            background-color: #2e8b57;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 6px;
        }
        button:hover {
            background-color: #256d47;
        }
        .result {
            margin-top: 25px;
            padding: 15px;
            border-left: 5px solid #2e8b57;
            background: #f2fff5;
        }
    </style>
</head>
<body>

<h2>Simulasi Struktur Data: Stack dan Queue</h2>
<p>Pilih jenis struktur data, lalu masukkan nama-nama yang datang (pisahkan dengan koma).</p>

<form method="POST">
    <label><b>Pilih Mode:</b></label>
    <select name="mode" required>
        <option value="">-- Pilih Mode --</option>
        <option value="stack">Stack (LIFO)</option>
        <option value="queue">Queue (FIFO)</option>
    </select>

    <label><b>Masukkan Nama-nama:</b></label>
    <input type="text" name="nama" placeholder="Contoh: Andi, Budi, Citra" required>

    <button type="submit">Proses</button>
</form>

<?php if (!empty($hasil)): ?>
<div class="result">
    <?= $hasil ?>
</div>
<?php endif; ?>

</body>
</html>
