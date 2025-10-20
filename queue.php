<?php
class Queue {
    private $items = [];

    // Menambah elemen ke antrian
    public function enqueue($item) {
        array_push($this->items, $item);
    }

    // Menghapus elemen pertama dari antrian
    public function dequeue() {
        if ($this->isEmpty()) {
            return "Queue kosong!";
        }
        return array_shift($this->items);
    }

    // Melihat elemen pertama tanpa menghapus
    public function front() {
        return reset($this->items);
    }

    // Mengecek apakah queue kosong
    public function isEmpty() {
        return empty($this->items);
    }

    // Menampilkan seluruh isi antrian
    public function display() {
        return $this->items;
    }
}

// Contoh penggunaan
$queue = new Queue();
$queue->enqueue("A");
$queue->enqueue("B");
$queue->enqueue("C");

echo "Isi Queue: ";
print_r($queue->display());

echo "Elemen pertama: " . $queue->front() . "\n";
echo "Dequeue: " . $queue->dequeue() . "\n";
print_r($queue->display());
?>
