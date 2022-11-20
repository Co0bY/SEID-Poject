{{-- Esse certificado foi um template retirado do site: https://support.edubrite.com/oltpublish/site/cms.do?view=html_certificate ; Todos os direitos ao seu criador. --}}
<body>
<div style="width:800px; height:600px; padding:20px; text-align:center; border: 10px solid #787878">
    <div style="width:750px; height:550px; padding:20px; text-align:center; border: 5px solid #787878">
           <span style="font-size:50px; font-weight:bold">Certificado de Conclusão de Curso</span>
           <br><br>
           <span style="font-size:25px"><i>Esse Certificado pertence á</i></span>
           <br><br>
           <span style="font-size:30px"><b>{{$registration->student->name}}</b></span><br/><br/>
           <span style="font-size:25px"><i>Completou o Curso:</i></span> <br/><br/>
           <span style="font-size:30px">{{$course->name}}</span> <br/><br/>
           <span style="font-size:25px"><i>Data de Término:</i></span><br>
          <span style="font-size:30px">{{date('d/m/Y')}}</span>
    </div>
    </div>
  </body>
