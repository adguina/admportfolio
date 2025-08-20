<?php
error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);
ini_set('display_errors', 0);

require_once('tcpdf/tcpdf.php');

$pdf = new TCPDF();
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Agnaldo D Moraes');
$pdf->SetTitle('Currículo - Agnaldo D Moraes');
$pdf->SetMargins(15, 20, 15);
$pdf->SetAutoPageBreak(TRUE, 20);
$pdf->AddPage();

// Fonte para suportar Unicode (ícones)
$pdf->SetFont('dejavusans', '', 8);

// Imagem redonda
$imgFile = __DIR__ . '/img/guinass.png';
if (file_exists($imgFile)) {
    $x = 35;
    $y = 25;
    $diameter = 40;

    $pdf->StartTransform();
    $pdf->Circle($x + $diameter / 2, $y + $diameter / 2, $diameter / 2, 'CNZ');
    $pdf->Image($imgFile, $x, $y, $diameter, $diameter, 'PNG', '', '', false, 300, '', false, false, 0, false, false, false);
    $pdf->StopTransform();
}

$css = <<<CSS
body {
    font-family: helvetica, sans-serif;
    color: #333333;
}
h1 {
    font-size: 17pt;
    margin-bottom: 2pt;
}
h2 {
    font-size: 14pt;
    color: #555555;
    margin-top: 0;
    margin-bottom: 10pt;
    white-space: nowrap;
}
h3 {
    font-size: 11pt;
    border-bottom: 1pt solid #ccc;
    padding-bottom: 3pt;
    margin-top: 10pt;
    margin-bottom: 5pt;
}
p, li {
    font-size: 8.2pt;
    line-height: 1.2;
    margin-top: 0;
    margin-bottom: 3pt;
}
ul {
    margin: 0 0 10pt 15pt;
}
.period {
    font-size: 6pt;
    color: #666666;
    margin-bottom: 10pt;
}
table {
    width: 100%;
    border-collapse: collapse;
}
td {
    vertical-align: top;
    padding-right: 10pt;
}
.small-font {
    text-align: justify;
    padding-left: 5pt;
}
.experience-block {
    margin-bottom: 15pt;
}
.resumo {
    line-height: 1.8;
}
.experience-block ul li {
    line-height: 1.8;
}
/* Cor de fundo da primeira coluna */
.coluna-esquerda {
    background-color: #f0f0f0;
    padding: 10pt;
    border-radius: 5pt;
}
.coluna-esquerda {
    background-color: #f0f0f0;
    padding: 10pt;
    border-radius: 5pt;
    padding-left: -25pt; /* desloca para esquerda */
}
CSS;

$html = <<<HTML
<style>$css</style>

<table>
<tr>
<td width="50%" class="coluna-esquerda">
<p style="line-height:150pt;">&nbsp;</p>
    <h1><span style="white-space: nowrap;">Agnaldo D Moraes</span></h1>
    <h2>Analista Suporte</h2>

    <h3>Detalhes de Contato</h3>
    <p>✉ adguina@email.com</p>
    <p>☎ (11) 97216-4906</p>
    <p>⌂ Itatiba - SP</p>

    <h3>Educação</h3>
        <div>
            <p><strong>Gestao T.I</strong><br>USF<br>2009 - 2011</p>
            <p><strong>Ciencia da Computacao</strong><br>Anhanguera<br>2013 - 2016</p>
        </div>

    <h3>Habilidades</h3>
        <ul>
            <li>Diagnóstico e solução de problemas técnicos</li>
            <li>Pensamento lógico e analítico</li>
            <li>Desenho e estruturação de sistemas</li>
            <li>Análise de dados para suporte e decisões</li>
            <li>Comunicação eficaz com usuários e equipes</li>
        </ul>
</td>

<td width="55%" class="small-font" style="padding-left: 10pt;">
    <h3>Resumo</h3>
    <p class="resumo">Analista de Suporte com sólida experiência em atendimento ao usuário, diagnóstico e resolução de problemas técnicos, manutenção de hardware e software, e administração de sistemas. Hábil na análise de incidentes, configuração de redes e suporte remoto e presencial, sempre priorizando a agilidade e a qualidade no atendimento. Proativo, com forte capacidade de comunicação e foco em soluções eficientes que assegurem a continuidade das operações e a satisfação do cliente.</p>

    <h3>Experiência Profissional</h3>

    <div class="experience-block">
        <p><strong>Analista de T.I - Monica Sanches Bolsas e Acessorios Ltda</strong><br>
        <span class="period">2012 - Atual</span></p>
        <ul>
            <li>Implantação e configuração de PDV (Ponto de Venda) nas lojas da rede, com treinamento para usuários finais.</li>
            <li>Suporte ao sistema de gestão GESTOR (CIGAM) e manutenção de estações Windows (7 a 11).</li>
            <li>Manutenção e configuração de computadores e impressoras térmicas e convencionais.</li>
            <li>Administração de servidores Linux Debian 12 e Ubuntu Server desenvolvidos internamente.</li>
            <li>Gerenciamento de servidores de arquivos com Active Directory, VPN e servidores de aplicativos web via Apache2.</li>
            <li>Desenvolvimento de aplicações web em PHP com bancos de dados PostgreSQL e MySQL.</li>
            <li>Criação e manutenção de rotinas de backup para sistemas e aplicações.</li>
        </ul>
    </div>

    <div class="experience-block">
        <p><strong>Analista de Suporte - Neotextil Indústria e Comércio de Tecidos Ltda</strong><br>
        <span class="period">2008 - 2012</span></p>
        <ul>
            <li>Suporte ao usuário final em sistemas Windows e administração de servidor Windows Server 2003.</li>
            <li>Instalação e manutenção de sistemas de gerenciamento para a área têxtil, com suporte e treinamento aos usuários.</li>
            <li>Manutenção de computadores e instalação de impressoras térmicas e convencionais.</li>
            <li>Auxílio na infraestrutura de redes.</li>
            <li>Apoio na area de PCP.</li>
        </ul>
    </div>

    <h3>Referências</h3>
    <p>Disponíveis mediante solicitação</p>
</td>
</tr>
</table>
HTML;

$pdf->writeHTML($html, true, false, true, false, '');

$pdf->Output('curriculo_agnaldo.pdf', 'I');
