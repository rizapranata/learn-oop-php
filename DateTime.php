<?php
// menambah tanggal sekarang dengan 2 minggu
$sekarang = new DateTime(null, new DateTimeZone('Asia/Jakarta'));
$duaMinggu = new DateInterval('P2W');
$sekarang->add($duaMinggu);
