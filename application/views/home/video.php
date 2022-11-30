<section class="bg-contact-us">
    <div class="container">
        <div class="row">
            <div class="contact-us">
                <div class="row">
                    <div class="col-md-8">
                        <h3 class="contact-title">Cek status</h3>
                        <h4> pengujian spesimen Anda kapan saja, dimana saja. </h4>
                        BBVet Medan berkomitmen untuk selalu meningkatkan pelayanan kepada masyarakat.
                        Telusuri status hasil uji spesimen Anda.
                        Sertifikat Hasil Uji dapat diambil langsung di bagian resepsionis BBVet Medan.
                        <form action="#" method="POST" class="contact-form" id="form_cek_epidomologi">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="no_epidomologi"
                                            name="no_epidomologi" placeholder="Nomor Epidemiologi">
                                    </div>
                                    <!-- .form-group -->
                                </div>

                                <button type="button" class="btn btn-default" onclick="cek_status_uji()">Cek Status
                                    Pengujian
                                </button>
                            </div>
                            <div class="row" id="row_success" style="display: none;">
                                <div class="alert alert-success" role="alert">
                                    <h4 class="alert-heading">Selamat !</h4>
                                    <p>No.Epidiemologi Anda : <label id="no_id_epidomologi">001213</label> dengan status
                                        <label id="status"></label>
                                    </p>
                                    <p class="mb-0">silahkan login <a href=""><b>ivlab.online</b></a> dan masukkan
                                        account anda
                                    </p>
                                </div>
                            </div>
                            <div class="row" id="row_alert" style="display: none;">
                                <div class="alert alert-danger" role="alert">
                                    <h4 class="alert-heading">Mohon Maaf !</h4>
                                    <p>No.Epidiemologi Anda Belum Terdaftar

                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- .col-md-8 -->

                    <!-- .col-md-4 -->
                </div>
                <!-- .row -->
            </div>
            <!-- .contact-us -->
        </div>
        <!-- .row -->
        <br>
        <div class="row">
            <div class="col-md-8">
                <h3 class="contact-title">Simulasi Harga Uji</h3>

                <i>*Sesuai dengan PP No. 35 Tahun 2016 tentang Jenis Penerimaan Negara
                    Bukan Pajak (PNBP) Yang Berlaku Pada Kementerian Pertanian.</i>
                <form action="#" method="POST" class="contact-form">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                Jenis pengujian
                                <select class="form-control">
                                    <option value='168' data-tokens='Mycoplasma'>Aglutinasi Mycoplasma gallisepticum
                                    </option>
                                    <option value='55' data-tokens='Salmonella Pullorum'>Aglutinasi Salmonella pullorum
                                    </option>
                                    <option value='193' data-tokens='Cacingan'>Apung Telur Cacing</option>
                                    <option value='36' data-tokens='Rabies'>Biologis Rabies</option>
                                    <option value='116' data-tokens='Coliform'>Cemaran Coliform</option>
                                    <option value='121' data-tokens='Eschericia coli'>Cemaran Eschericia coli</option>
                                    <option value='155' data-tokens='Salmonella sp'>Cemaran Salmonella sp</option>
                                    <option value='200' data-tokens='Staphylococcus aureus'>Cemaran Staphylococcus
                                        aureus</option>
                                    <option value='146' data-tokens='Total Plate Count'>Cemaran TPC</option>
                                    <option value='46' data-tokens='Brucellosis'>CFT Brucella abortus</option>
                                    <option value='47' data-tokens='Brucellosis'>CFT Brucella melitensis</option>
                                    <option value='235' data-tokens='Eber'>Eber</option>
                                    <option value='247' data-tokens='Brucella abortus'>ELISA ab Brucella abortus
                                    </option>
                                    <option value='78' data-tokens='Bovine Viral Diarrhea'>ELISA ab BVD</option>
                                    <option value='81' data-tokens='Classical Swine Fever'>ELISA ab CSF</option>
                                    <option value='93' data-tokens='Infectious Bovine Rhinotracheitis'>ELISA ab IBR
                                    </option>
                                    <option value='68' data-tokens='Neosporosis'>ELISA ab Neospora caninum</option>
                                    <option value='49' data-tokens='Paratuberculosis'>ELISA ab Para TBC</option>
                                    <option value='158' data-tokens='Septichaemia Epizootica'>ELISA ab Pasteurella
                                        multocida</option>
                                    <option value='107' data-tokens='Rabies'>ELISA ab Rabies</option>
                                    <option value='70' data-tokens='Toxoplasmosis'>ELISA ab Toxoplasma gondii</option>
                                    <option value='240' data-tokens='Surra'>ELISA ab Trypanosoma evansi</option>
                                    <option value='79' data-tokens='Bovine Viral Diarrhea'>ELISA ag BVD</option>
                                    <option value='82' data-tokens='Classical Swine Fever'>ELISA ag CSF</option>
                                    <option value='92' data-tokens='Infectious Bovine Rhinotracheitis'>ELISA ag IBR
                                    </option>
                                    <option value='108' data-tokens='Rabies'>ELISA ag Rabies</option>
                                    <option value='101' data-tokens='Penyakit Mulut dan Kuku'>ELISA antibodi PMK
                                    </option>
                                    <option value='37' data-tokens='Rabies'>FAT Rabies</option>
                                    <option value='224' data-tokens='Avian Influenza'>HI AI H5 Clade 2.1.3</option>
                                    <option value='225' data-tokens='Avian Influenza'>HI AI H5 Clade 2.3.2</option>
                                    <option value='184' data-tokens='Avian Influenza'>HI AI H9</option>
                                    <option value='99' data-tokens='Newcastle Disease'>HI ND</option>
                                    <option value='185' data-tokens=''>Histopatologi</option>
                                    <option value='3' data-tokens='Bovine Spongiform Encephalopathy'>Histopatologi BSE
                                    </option>
                                    <option value='41' data-tokens='Rabies'>Histopatologi Rabies</option>
                                    <option value='179' data-tokens='Boraks'>Identifikasi Cepat Boraks</option>
                                    <option value='178' data-tokens='Formalin'>Identifikasi Cepat Formalin</option>
                                    <option value='176' data-tokens='Racun Sianida'>Identifikasi Cepat Sianida</option>
                                    <option value='236' data-tokens='Coccidiosis'>Identifikasi Coccidiosis</option>
                                    <option value='180' data-tokens='Hematologi'>Identifikasi Differensial Leukosit
                                    </option>
                                    <option value='187' data-tokens=''>Identifikasi Ektoparasit</option>
                                    <option value='250' data-tokens='Endoparasit'>Identifikasi Endoparasit</option>
                                    <option value='48' data-tokens=''>Identifikasi Morfologi Bakteri</option>
                                    <option value='69' data-tokens='Infeksi Parasit Darah'>Identifikasi Parasit Darah
                                    </option>
                                    <option value='4' data-tokens=''>IHC BVD</option>
                                    <option value='11' data-tokens='Rabies'>IHC Rabies</option>
                                    <option value='21' data-tokens='Avian Influenza'>Isolasi AI</option>
                                    <option value='226' data-tokens='Avian Influenza'>Isolasi AI H5 Clade 2.1.3</option>
                                    <option value='227' data-tokens='Avian Influenza'>Isolasi AI H5 Clade 2.3.2</option>
                                    <option value='43' data-tokens='Anthraks'>Isolasi Bacillus anthracis</option>
                                    <option value='182' data-tokens='Infeksi Bakteri'>Isolasi Bakteri</option>
                                    <option value='183' data-tokens='Campylobacteriosis'>Isolasi Campylobacter</option>
                                    <option value='192' data-tokens='Brucellosis'>Isolasi dan Identifikasi Brucella
                                        abortus</option>
                                    <option value='214' data-tokens='Eschericia coli'>Isolasi dan Identifikasi
                                        Eschericia coli</option>
                                    <option value='195' data-tokens='Aspergillus'>Isolasi dan Identifikasi Jamur
                                    </option>
                                    <option value='209' data-tokens='Mycoplasmosis'>Isolasi dan Identifikasi Mycoplasma
                                        gallisepticum</option>
                                    <option value='52' data-tokens='Septichaemia Epizootica'>Isolasi dan Identifikasi
                                        Pasteurella multocida</option>
                                    <option value='56' data-tokens='Pullorum'>Isolasi dan Identifikasi Salmonella
                                        pullorum</option>
                                    <option value='138' data-tokens='Staphylococcus'>Isolasi dan Identifikasi
                                        Staphyloccocus sp</option>
                                    <option value='120' data-tokens='Eschericia Coli'>Isolasi Eschericia coli</option>
                                    <option value='33' data-tokens='Newcastle Disease'>Isolasi ND</option>
                                    <option value='61' data-tokens='Salmonellosis'>Isolasi Salmonella sp</option>
                                    <option value='245' data-tokens=''>Jemput Sampel</option>
                                    <option value='232' data-tokens='Brucellosis'>Konv-PCR B. abortus
                                    </option>
                                    <option value='189' data-tokens='Brucellosis'>Konv-PCR B. melitensis</option>
                                    <option value='177' data-tokens='Anthraks'>Konv-PCR Bacillus anthracis</option>
                                    <option value='13' data-tokens='Bovine Viral Diarrhea'>Konv-PCR BVD</option>
                                    <option value='15' data-tokens='Classical Swine Fever'>Konv-PCR CSF</option>
                                    <option value='266' data-tokens='Cardiovirus A'>Konv-PCR Encephalomyocarditis
                                    </option>
                                    <option value='215' data-tokens='Avian Influenza'>Konv-PCR Influenza Tipe A</option>
                                    <option value='98' data-tokens='Jembrana Disease'>Konv-PCR Jembrana</option>
                                    <option value='238' data-tokens='Newcastle Disease'>Konv-PCR ND</option>
                                    <option value='35' data-tokens='Porcine Reproductive And Respiratory Syndrome'>
                                        Konv-PCR PRRS</option>
                                    <option value='127' data-tokens='Spesies Babi'>Konv-PCR spesies babi </option>
                                    <option value='128' data-tokens='Spesies Sapi'>Konv-PCR spesies sapi
                                    </option>
                                    <option value='163' data-tokens='Spesies tikus'>Konv-PCR Spesies Tikus</option>
                                    <option value='257' data-tokens='Spesies Unggas'>Konv-PCR spesies unggas</option>
                                    <option value='249' data-tokens='Virus family'>Konv-PCR Virus family</option>
                                    <option value='125' data-tokens='Formalin'>Kualitatif Formalin</option>
                                    <option value='246' data-tokens='Cacingan'>Natif</option>
                                    <option value='6' data-tokens=''>Nekropsi Hewan Kecil</option>
                                    <option value='7' data-tokens='Rabies'>Nekropsi Kepala</option>
                                    <option value='8' data-tokens=''>Nekropsi Unggas</option>
                                    <option value='157' data-tokens='Organoleptik'>Organoleptik</option>
                                    <option value='170' data-tokens='Anthraks'>PCMB (Polychrome Methylene blue) Anthraks
                                    </option>
                                    <option value='190' data-tokens='Hematologi'>PCV Hematologi</option>
                                    <option value='9' data-tokens='Penyakit lain'>Pembuatan Slide Histo</option>
                                    <option value='248' data-tokens='pH'>pH</option>
                                    <option value='265' data-tokens='Cacingan'>Protozoa McMaster</option>
                                    <option value='59' data-tokens='Brucellosis'>RBT Brucella abortus</option>
                                    <option value='60' data-tokens='Brucellosis'>RBT Brucella melitensis</option>
                                    <option value='199' data-tokens='Residu Kanamisin'>Residu Kanamisin Bioassay
                                    </option>
                                    <option value='197' data-tokens='Residu Oksitetrasiklin'>Residu Oksitetrasiklin
                                        Bioassay</option>
                                    <option value='198' data-tokens='Residu Penisilin'>Residu Penisilin Bioassay
                                    </option>
                                    <option value='196' data-tokens='Residu Tilosin'>Residu Tilosin Bioassay</option>
                                    <option value='27' data-tokens='Avian Influenza'>RT-PCR AI H5</option>
                                    <option value='29' data-tokens='Avian Influenza'>RT-PCR AI H7</option>
                                    <option value='186' data-tokens='Avian Influenza'>RT-PCR AI H9</option>
                                    <option value='262' data-tokens='African Swine Fever'>RT-PCR ASF</option>
                                    <option value='151' data-tokens='Avian Influenza'>RT-PCR Influenza Tipe A</option>
                                    <option value='242' data-tokens='Cacingan'>Sedimentasi Telur Cacing</option>
                                    <option value='251' data-tokens='Cacingan'>Sedimentasi Trematoda</option>
                                    <option value='42' data-tokens='Rabies'>Seller's Rabies</option>
                                    <option value='243' data-tokens='Cacingan'>Telur Cacing/Cacing McMaster</option>
                                    <option value='244' data-tokens='Cacingan'>Telur Cacing/Cacing Whitlock</option>
                                    <option value='181' data-tokens='Hematologi'>Total Protein Plasma</option>
                                    <option value='191' data-tokens='Hematologi'>TPP Hematologi</option>
                                    <option value='237' data-tokens=''>Uji Sensitivitas Antibiotika</option>
                                </select>
                            </div>
                            Jumlah spesimen
                            <input type="text" class="form-control" id="jlh_pengujian" name="jlh_pengujian"
                                placeholder="0">
                        </div>
                        <!-- .form-group -->
                    </div>
                    <div class="row pb-5" id="row_hasil">
                        <div class="col-md-6">
                            <h2 class="pb-3 text-primary" id="hasil_pengujian"></h2>
                        </div>
                    </div>
                    <button type="button" class="btn btn-default" onclick="hitung_estimasi()">Hitung Estimasi</button>
                </form>
            </div>
            <!-- .col-md-8 -->

            <!-- .col-md-4 -->
        </div>
    </div>
    <!-- .container -->
</section>
<!-- End Contact us Section -->

<!-- Start campaian video Section -->
<!--
<section class="bg-compaian-video">
    <div class="compaian-video-overlay">
        <div class="container">
            <div class="row">
                <div class="compaian-video">
                   <a href="https://www.youtube.com/watch?v=eRqsrRkzY7g" data-rel="lightcase:myCollection"><img src="<?php //echo base_url() 
                                                                                                                        ?>assets/tema/assets/images/home02/video-icon.png" alt="video-icon" /></a>
                    
                    <h3>Profile Balai Veteriner Medan</h3>
-->
</div>
<!-- .compaian-video -->
</div>
<!-- .row -->
</div>
<!-- .container -->
</div>
<!-- .compaian-video-overlay -->
</section>

<!-- End campaian video Section -->

<script>
function cek_status_uji() {
    var x = document.getElementById("row_success");
    var z = document.getElementById("row_alert");
    var no_epidomologi = $("#no_epidomologi").val();
    var formupload = document.getElementById("form_cek_epidomologi");
    var formdata = new FormData(formupload);
    $.ajax({
        url: "<?php echo base_url('video/check') ?>",
        method: "POST",
        denctype: "multipart/form-data",
        processData: false, // tell jQuery not to process the data
        contentType: false,
        data: formdata,
        dataType: "json",
        success: function(data) {
            if (data.epidomologi != '') {
                x.style.display = 'block';
                z.style.display = 'none';
                document.getElementById("no_id_epidomologi").innerHTML = data.epidomologi;
                document.getElementById("status").innerHTML = data.status;
            } else {
                z.style.display = 'block';
                x.style.display = 'none';
            }
        }
    });
}

function hitung_estimasi() {
    var x = document.getElementById("row_hasil");
    var jlh = $("#jlh_pengujian").val();
    var z = jlh * 5000;
    x.style.display = 'none';
    x.style.display = 'block';
    document.getElementById("hasil_pengujian").innerHTML = "Rp." + z;
}
</script>