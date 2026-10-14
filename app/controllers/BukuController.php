<?php
class BukuController
{
    public function __construct(private Buku $model) {}

    public function index(): void
    {
        $buku = $this->model->getAll();
        $pesan = $this->getPesan($_GET['status'] ?? '');
        require __DIR__ . '/../views/buku/index.php';
    }

    public function create(): void
    {
        require __DIR__ . '/../views/buku/create.php';
    }

    public function store(): void
    {
        $data = $this->validateInput($_POST);

        try {
            $this->model->insert($data);
            $status = 'tambah_berhasil';
        } catch (PDOException $e) {
            $status = $e->getCode() === '23000' ? 'isbn_duplikat' : 'gagal';
        }

        $this->redirect($status);
    }

    public function edit(): void
    {
        $id = (int) ($_GET['id'] ?? 0);
        $buku = $this->model->findById($id);

        if (!$buku) {
            http_response_code(404);
            exit('Data buku tidak ditemukan.');
        }

        require __DIR__ . '/../views/buku/edit.php';
    }

    public function update(): void
    {
        $id = (int) ($_POST['id'] ?? 0);
        $data = $this->validateInput($_POST);

        try {
            $this->model->update($id, $data);
            $status = 'ubah_berhasil';
        } catch (PDOException $e) {
            $status = $e->getCode() === '23000' ? 'isbn_duplikat' : 'gagal';
        }

        $this->redirect($status);
    }

    public function delete(): void
    {
        $id = (int) ($_POST['id'] ?? 0);

        try {
            $this->model->delete($id);
            $status = 'hapus_berhasil';
        } catch (PDOException $e) {
            $status = 'gagal';
        }

        $this->redirect($status);
    }

    private function validateInput(array $input): array
    {
        $data = [
            'isbn'         => trim($input['isbn'] ?? ''),
            'judul'        => trim($input['judul'] ?? ''),
            'penulis'      => trim($input['penulis'] ?? ''),
            'penerbit'     => trim($input['penerbit'] ?? ''),
            'tahun_terbit' => trim($input['tahun_terbit'] ?? '')
        ];

        if (in_array('', $data, true) || !ctype_digit($data['tahun_terbit'])) {
            $this->redirect('gagal_validasi');
        }

        $data['tahun_terbit'] = (int) $data['tahun_terbit'];
        return $data;
    }

    private function getPesan(string $status): ?array
    {
        return match ($status) {
            'tambah_berhasil' => ['sukses', 'Data buku berhasil ditambahkan.'],
            'ubah_berhasil'   => ['sukses', 'Data buku berhasil diperbarui.'],
            'hapus_berhasil'  => ['sukses', 'Data buku berhasil dihapus.'],
            'gagal_validasi'  => ['gagal', 'Gagal: semua field wajib diisi dan tahun terbit harus berupa angka.'],
            'isbn_duplikat'   => ['gagal', 'Gagal: ISBN sudah terdaftar.'],
            'gagal'           => ['gagal', 'Gagal: terjadi kesalahan pada database.'],
            default           => null
        };
    }

    private function redirect(string $status): void
    {
        header('Location: index.php?page=buku&status=' . $status);
        exit;
    }
}
?>