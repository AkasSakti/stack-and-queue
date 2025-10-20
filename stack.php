<?php
class Stack {
    private $items = [];

    // Menambah elemen ke tumpukan
    public function push($item) {
        array_push($this->items, $item);
    }

    // Menghapus elemen terakhir
    public function pop() {
        if ($this->isEmpty()) {
            return "Stack kosong!";
        }
        return array_pop($this->items);
    }

    // Melihat elemen terakhir tanpa menghapus
    public function peek() {
        return end($this->items);
    }

    // Mengecek apakah stack kosong
    public function isEmpty() {
        return empty($this->items);
    }

    // Menampilkan seluruh isi stack
    public function display() {
        return array_reverse($this->items);
    }
}

// Contoh penggunaan
$stack = new Stack();
$stack->push("A");
$stack->push("B");
$stack->push("C");

echo "Isi Stack: ";
print_r($stack->display());

echo "Elemen teratas: " . $stack->peek() . "\n";
echo "Pop: " . $stack->pop() . "\n";
print_r($stack->display());
?>
