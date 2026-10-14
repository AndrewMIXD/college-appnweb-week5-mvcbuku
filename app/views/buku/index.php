<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Buku</title>
</head>
<body>
    <h2>Daftar Buku</h2>

    <?php if ($pesan): ?>
        <p style="padding: 8px; color: white; background: <?= $pesan[0] === 'sukses' ? 'green' : 'crimson' ?>;">
            <?= htmlspecialchars($pesan[1]) ?>
        </p>
    <?php endif; ?>

    <a href="index.php?page=buku&action=create">Tambah Data</a>
    <br><br>

    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>ISBN</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Tahun Terbit</th>
            <th>Aksi</th>
        </tr>

        <?php if (empty($buku)): ?>
        <tr>
            <td colspan="6">Belum ada data buku.</td>
        </tr>
        <?php endif; ?>

        <?php foreach ($buku as $b): ?>
        <tr>
            <td><?= htmlspecialchars($b['isbn']) ?></td>
            <td><?= htmlspecialchars($b['judul']) ?></td>
            <td><?= htmlspecialchars($b['penulis']) ?></td>
            <td><?= htmlspecialchars($b['penerbit']) ?></td>
            <td><?= htmlspecialchars($b['tahun_terbit']) ?></td>
            <td>
                <a href="index.php?page=buku&action=edit&id=<?= $b['id'] ?>">Edit</a>

                <form method="post"
                      action="index.php?page=buku&action=delete"
                      style="display:inline"
                      onsubmit="return confirm('Hapus buku ini?')">
                    <input type="hidden" name="id" value="<?= $b['id'] ?>">
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>