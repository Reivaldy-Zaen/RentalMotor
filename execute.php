<?php
class Data
{
    public $member;
    public $jenis;
    public $waktu;
    public $diskon;
    protected $pajak;
    private $scooter, $sport, $sporttouring, $cross;
    private $listmember = ['zaen', 'opang', 'adul', 'cipung'];

    function __construct()
    {
        $this->pajak = 15000;
    }

    public function getMember()
    {
        if (in_array($this->member, $this->listmember)) {
            return "member";
        } else {
            return "non member";
        }
    }

    public function setharga($jenis1, $jenis2, $jenis3, $jenis4, $jenis5, $jenis6, $jenis7)
    {
        $this->aerox = $jenis1;
        $this->Vario = $jenis2;
        $this->R15 = $jenis3;
        $this->cbr150r = $jenis4;
        $this->cbr250r = $jenis5;
        $this->pcx = $jenis6;
        $this->klx = $jenis7;
    }

    public function getHarga()
    {
        $data['aerox'] = $this->aerox;
        $data['Vario'] = $this->Vario;
        $data['R15'] = $this->R15;
        $data['cbr150r'] = $this->cbr150r;
        $data['cbr250r'] = $this->cbr250r;
        $data['pcx'] = $this->pcx;
        $data['klx'] = $this->klx;
        return $data;
    }
}

class rental extends Data
{
    public function hargaRental()
    {
        $dataHarga = $this->getHarga()[$this->jenis];
        $diskon = $this->getMember() == "member" ? 50 : 0;
        if ($this->waktu === 1) {
            $bayar = ($dataHarga - ($dataHarga * $diskon / 100)) + $this->pajak;
        } else {
            $bayar = (($dataHarga * $this->waktu) - ($dataHarga * $diskon / 100)) + $this->pajak;
        }
        return [$bayar, $diskon];
    }


    public function pembayaran()
    {
        echo "<center>";
        echo "<br>";
        echo "<hr>";
        echo $this->member . "<br>" . "berstatus sebagai " . $this->getMember() . " mendapatkan diskon sebesar " . $this->hargaRental()[1] . "%";
        echo "<br>";
        echo "Jenis motor yang dirental adalah " . $this->jenis . " selama " . $this->waktu . " hari";
        echo "<br>";
        echo "Harga rental per-harinya : Rp. " . number_format($this->getHarga()[$this->jenis]);
        echo "<br>";
        echo "<b>Besar yang harus dibayarkan adalah: Rp. " . number_format($this->hargaRental()[0]) . " (<i>Termasuk Pajak)</i></b>";
        echo "<hr>";
        echo "</center>";
    }
}