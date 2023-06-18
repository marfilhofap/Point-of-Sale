<?php
$nu_meza = $_GET['nu_meza'];
$data = $_GET['data'];
$oras = $_GET['oras'];
$formatu_oras = new DateTime($oras);
$oras_lolos = $formatu_oras->format('H:i');

if (!empty($nu_meza) && !empty($data) && !empty($oras)) {

  require_once('tcpdf_include.php');
  include_once '../../../../config/parametros_db.php';
  include_once '../../../autentication/connection.php';

  $conn = new connection(PSQLHOST, PSQLUSER, PSQLPW, PSQLDB);;
  $a = $conn->open_pgconnect();

  $export = pg_query($a, "SELECT nu_meza, naran_produtu, folin, kuantidade, total, data, oras_tama, oras_selu, naran_kompletu, id_membru from relatorio d1 where nu_meza='$nu_meza' and data='$data' and oras_selu='$oras' order by oras_tama ASC");


  // Extend the TCPDF class to create custom Header and Footer
  class MYPDF extends TCPDF
  {

    //Page header
    public function Header()
    {
      // Logo
      $image_file = K_PATH_IMAGES . 'logo_ls.jpg';
      $this->Image($image_file, 55, 4, 100, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
      // Set font
      // $this->setFont('helvetica', 'B', 20);
      // Title
      // $this->Cell(0, 15, 'Comissão da Função Pública', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }

    // Page footer
    public function Footer()
    {
      // Position at 15 mm from bottom
      $this->setY(-15);

      // Set font
      $this->setFont('helvetica', 'I', 8);

      // Page number
      $this->Cell(0, 10, 'Página ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');

      // Position at 15 mm from bottom
      $this->setY(-15);

      // Set font
      $this->setFont('helvetica', 'I', 8);

      $this->Cell(0, 10, 'Imprimi iha dia '.date("d-m-Y H:i:s").' husi POS - Love Story', 0, false, 'R', 0, '', 0, false, 'T', 'M');
    }
  }

  // create new PDF document
  $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

  // set document information
  $pdf->SetCreator(PDF_CREATOR);
  $pdf->SetAuthor('Love Story');
  $pdf->SetTitle('Love Story - Coffee, Bar and Resto');
  $pdf->SetSubject('POS');
  $pdf->SetKeywords('POS, Love Story, Timor-Leste, Caffe');

  // set default header data
  $pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

  // set header and footer fonts
  $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
  $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

  // set default monospaced font
  $pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

  // set margins
  $pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
  $pdf->setHeaderMargin(PDF_MARGIN_HEADER);
  $pdf->setFooterMargin(PDF_MARGIN_FOOTER);

  // set auto page breaks
  $pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

  // set image scale factor
  $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

  // set some language-dependent strings (optional)
  if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
    require_once(dirname(__FILE__) . '/lang/eng.php');
    $pdf->setLanguageArray($l);
  }

  // -----------------------------------------------------------------------------------------



  // -----------------------------------------------------------------------------------------

  // add a page
  $pdf->AddPage('P', 'A4');

  $br = '<br><br><br>';

  // print a block of text using Write()
  $pdf->writeHTML($br, true, false, false, false, '');

  // set font
  $pdf->setFont('times', 'B', 12);

  $titulu = 'Resibu Love Story (Meza ' . $nu_meza . ')';

  // print a block of text using Write()
  $pdf->Write(0, $titulu, '', 0, 'C', true, 0, false, false, 0);

  // -----------------------------------------------------------------------------------------

  $br = '<br>';

  // print a block of text using Write()
  $pdf->writeHTML($br, true, false, false, false, '');

  // -----------------------------------------------------------------------------------------

  // set font
  $pdf->setFont('times', '', 10);


  // set some text to print
  $txt = '<table border="1" cellpadding="3" cellspacing="0">
   <thead>
     <tr style="background-color:#4d94ff;color:#000000">
      <th width="60" align="center"><b>No</b></th>
      <th width="250" align="center"><b>Produtu</b></th>
      <th width="90" align="center"><b>Folin</b></th>
      <th width="90" align="center"><b>Kuantidade</b></th>
      <th width="100" align="center"><b>Total Folin</b></th>
     </tr>
     </thead>
     <tbody>';

  $row = pg_fetch_all($export);

  $no = 1;
  $kuantidade_total = 0;
  $folin_total = 0;
  foreach ($row as $key => $dados) {
    $naran_produtu = $dados['naran_produtu'];
    $folin = $dados['folin'];
    $kuantidade = $dados['kuantidade'];
    $kuantidade_total +=$kuantidade;
    $total = $dados['total'];
    $folin_total += $total;

    $txt .= '<tr>
      <td width="60" align="center">' . $no++ . '</td>
      <td width="250" align="center">' . $naran_produtu . '</td>
      <td width="90" align="center">$ ' . $folin . '</td>
      <td width="90" align="center">' . $kuantidade . '</td>
      <td width="100" align="center">$ ' . $total . '</td>
     </tr>';
  }

  $txt .= '<tr>
      <td width="400" align="center"><b>Total</b></td>
      <td width="90" align="center"><b>'.$kuantidade_total.'</b></td>
      <td width="100" align="center"><b>$ '.$folin_total.'</b></td>
     </tr>';

  $txt .= '</tbody>
   </table>';

  // print a block of text using Write()
  $pdf->writeHTML($txt, true, false, false, false, '');

  // -----------------------------------------------------------------------------------------

  $br = '<br><br><br>';

  // print a block of text using Write()
  $pdf->writeHTML($br, true, false, false, false, '');


  // -----------------------------------------------------------------------------------------

  //Close and output PDF document
  $pdf->Output('Resibu_POS_Love_Story_' . date('Y-m-d-G-i-s') . '.pdf', 'I');

  //============================================================+
  // END OF FILE
  //============================================================+


} else {
  var_dump($_GET);
}
