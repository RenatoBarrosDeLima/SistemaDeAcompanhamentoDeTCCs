<?php
// A sessão precisa ser iniciada em cada página diferente
if (!isset($_SESSION))
    session_start();

// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['MATRICULA_PROF_COORDENADOR'])) {
    // Destrói a sessão por segurança
    session_destroy();
    // Redireciona o visitante de volta pro login
    echo "<script>alert('Registro Não Autenticado!');document.location='../../index.php'</script>";
    exit;
}
?>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />

        <!-- Bootstrap core CSS     -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />

        <!-- Animation library for notifications   -->
        <link href="../assets/css/animate.min.css" rel="stylesheet"/>

        <!--  Light Bootstrap Table core CSS    -->
        <link href="../assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>

        <!--  CSS for Demo Purpose, don't include it in your project     -->
        <link href="../assets/css/demo.css" rel="stylesheet" />

        <!--     Fonts and icons     -->
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
        <link href="../assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
        <link rel='stylesheet' href='fullcalendar/fullcalendar.css' />
        <script src='fullcalendar/lib/jquery.min.js'></script>
        <script src='fullcalendar/lib/moment.min.js'></script>
        <script src='fullcalendar/fullcalendar.js'></script>

        <!-- script de tradução -->
        <script src='fullcalendar/lang/pt-br.js'></script>

        <script>
            $(document).ready(function () {
                !function (e) {
                    "function" == typeof define && define.amd ? define(["jquery", "moment"], e) : "object" == typeof exports ? module.exports = e(require("jquery"), require("moment")) : e(jQuery, moment)
                }(function (e, a) {
                    !function () {
                        a.defineLocale("pt-br", {months: "Janeiro_Fevereiro_Março_Abril_Maio_Junho_Julho_Agosto_Setembro_Outubro_Novembro_Dezembro".split("_"), monthsShort: "Jan_Fev_Mar_Abr_Mai_Jun_Jul_Ago_Set_Out_Nov_Dez".split("_"), weekdays: "Domingo_Segunda-feira_Terça-feira_Quarta-feira_Quinta-feira_Sexta-feira_Sábado".split("_"), weekdaysShort: "Dom_Seg_Ter_Qua_Qui_Sex_Sáb".split("_"), weekdaysMin: "Do_2ª_3ª_4ª_5ª_6ª_Sá".split("_"), weekdaysParseExact: !0, longDateFormat: {LT: "HH:mm", LTS: "HH:mm:ss", L: "DD/MM/YYYY", LL: "D [de] MMMM [de] YYYY", LLL: "D [de] MMMM [de] YYYY [às] HH:mm", LLLL: "dddd, D [de] MMMM [de] YYYY [às] HH:mm"}, calendar: {sameDay: "[Hoje às] LT", nextDay: "[Amanhã às] LT", nextWeek: "dddd [às] LT", lastDay: "[Ontem às] LT", lastWeek: function () {
                                    return 0 === this.day() || 6 === this.day() ? "[Último] dddd [às] LT" : "[Última] dddd [às] LT"
                                }, sameElse: "L"}, relativeTime: {future: "em %s", past: "%s atrás", s: "poucos segundos", m: "um minuto", mm: "%d minutos", h: "uma hora", hh: "%d horas", d: "um dia", dd: "%d dias", M: "um mês", MM: "%d meses", y: "um ano", yy: "%d anos"}, dayOfMonthOrdinalParse: /\d{1,2}º/, ordinal: "%dº"})
                    }(), e.fullCalendar.datepickerLocale("pt-br", "pt-BR", {closeText: "Fechar", prevText: "&#x3C;Anterior", nextText: "Próximo&#x3E;", currentText: "Hoje", monthNames: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"], monthNamesShort: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"], dayNames: ["Domingo", "Segunda-feira", "Terça-feira", "Quarta-feira", "Quinta-feira", "Sexta-feira", "Sábado"], dayNamesShort: ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sáb"], dayNamesMin: ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sáb"], weekHeader: "Sm", dateFormat: "dd/mm/yy", firstDay: 0, isRTL: !1, showMonthAfterYear: !1, yearSuffix: ""}), e.fullCalendar.locale("pt-br", {buttonText: {month: "Mês", week: "Semana", day: "Dia", list: "Compromissos"}, allDayText: "dia inteiro", eventLimitText: function (e) {
                            return"mais +" + e
                        }, noEventsMessage: "Não há eventos para mostrar"})
                });

                var today = moment(Date()).format("YYYY-MM-DD");

                //CARREGA CALENDÁRIO E EVENTOS DO BANCO
                $('#calendario').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'agendaDay,agendaWeek,month'
                    },
                    defaultDate: today,
                    editable: true,
                    eventLimit: true,
                    events: 'eventos.php',
                    eventColor: '#dd6777'
                });

                //CADASTRA NOVO EVENTO
                $('#novo_evento').submit(function () {
                    //serialize() junta todos os dados do form e deixa pronto pra ser enviado pelo ajax
                    var dados = jQuery(this).serialize();
                    $.ajax({
                        type: "POST",
                        url: "cadastrar_evento.php",
                        data: dados,
                        success: function (data)
                        {
                            if (data == "1") {
                                alert("Cadastrado com sucesso! ");
                                //atualiza a página!
                                location.reload();
                            } else {
                                alert("Houve algum problema.. ");
                            }
                        }
                    });
                    return false;
                });
            });

        </script>

        <style>
            #calendario{
                position: relative;
                width: 100%;
                margin: auto;
            }        
        </style>
    </head>
    <body>
        <div class="wrapper">
            <?php
            include 'menu_esquerdo.php';
            ?> 

            <div class="main-panel">
                <?php
                include 'menu_superior.php';
                ?>
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="card">
                                    <div class="content">

                                        <div class="ct-chart-bar" id='calendario'></div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-5">
                                <div class="card">
                                    <div class="header">
                                        <h4 class="title">Cadastrar Evento </h4>
                                    </div>
                                    <div class="content">
                                        <div class="ct-chart-bar"></div>
                                        <form id="novo_evento" action="" method="post">
                                            Nome do Evento: <input type="text" name="nome" class="form-control" placeholder="Nome do Evento" required/>            
                                            <br>
                                            Período Atual da Turma: <input type="text" name="periodo" class="form-control" placeholder="Ex: 2017.2" required/>
                                            <br>
                                            Data do Evento: <input type="date" name="data" class="form-control" required/>  
                                            <br>
                                            <input type="hidden" name="codCurso" value="<?php echo $_SESSION['CURSO_PROF_COORDENADOR']; ?>" required/>
                                            <br>
                                            <button type="submit" class="btn btn-success btn-fill"> Salvar novo evento </button>
                                            <a href="#"<button class="btn btn-warning btn-fill"> Editar </button></a>
                                            <a href="#"<button class="btn btn-default btn-fill"> Cancelar </button></a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <?php include './menu_rodape.php'; ?>
            </div>
        </div>
    </body>
</html>
