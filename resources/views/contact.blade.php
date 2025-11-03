<h1>Form Kontak</h1>
<form action="/contact" method="POST">
    @csrf
    <input type="text" name="nama" placeholder="Nama"><br>
    <input type="email" name="email" placeholder="Email"><br>
    <textarea name="pesan" placeholder="Pesan"></textarea><br>
    <button type="submit">Kirim</button>
</form>