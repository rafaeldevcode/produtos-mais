@extends('marca/layouts/layout')

@section('conteudo')
    <main class="container bg-light p-0 politicas">
        <h1 class="m-0 text-center py-5 fw-bolder fs-2">POLÍTICAS DE PRIVACIDADE</h1>

        <section class="p-3 p-sm-5 mx-0 mx-md-5 text-justify">
            <h2>Informações</h2>
            <p>Todas as suas informações pessoais recolhidas, serão usadas para o ajudar a tornar a sua visita no nosso site o mais produtiva e agradável possível.</p>
  
            <p>A garantia da confidencialidade dos dados pessoais dos utilizadores do nosso site é importante para a marca {{ $marca->nome_marca }}.</p>
            <p>Todas as informações pessoais relativas a membros, assinantes, clientes ou visitantes que usem o site da marca {{ $marca->nome_marca }} serão tratadas em concordância com a Lei da Proteção de Dados Pessoais de 26 de outubro de 1998 (Lei n.º 67/98).</p>
            <p>As informações pessoal recolhida pode incluir o seu nome, e-mail, número de telefone e/ou telemóvel, morada, data de nascimento e/ou outros.</p>
            <p>O uso do site da marca {{ $marca->nome_marca }} pressupõe a aceitação deste Acordo de privacidade. A equipe da marca {{ $marca->nome_marca }} reserva-se ao direito de alterar este acordo sem aviso prévio. Deste modo, recomendamos que consulte a nossa política de privacidade com regularidade de forma a estar sempre atualizado.</p>
      
            <h2>Os anúncios</h2>
            <p>Tal como outros websites, coletamos e utilizamos informação contida nos anúncios. A informação contida nos anúncios, inclui o seu endereço IP (Internet Protocol), o seu ISP (Internet Service Provider, como o Sapo, Clix, ou outro), o browser que utilizou ao visitar o nosso website (como o Internet Explorer ou o Firefox), o tempo da sua visita e que páginas visitou dentro do nosso website.</p>
           
            <h2>Os Cookies e Web Beacons</h2>
            <p>Utilizamos cookies para armazenar informação, tais como as suas preferências pessoais quando visita o nosso website. Isto poderá incluir um simples popup, ou uma ligação em vários serviços que providenciamos, tais como fóruns.</p>
            <p>Em adição também utilizamos publicidade de terceiros no nosso website para suportar os custos de manutenção. Alguns destes publicitários, poderão utilizar tecnologias como os cookies e/ou web beacons quando publicitam no nosso website, o que fará com que esses publicitários (como o Google através do Google AdSense) também recebam a sua informação pessoal, como o endereço IP, o seu ISP, o seu browser, etc. Esta função é geralmente utilizada para geotargeting (mostrar publicidade de Lisboa apenas aos leitores oriundos de Lisboa por ex.) ou apresentar publicidade direcionada a um tipo de utilizador (como mostrar publicidade de restaurante a um utilizador que visita sites de culinária regularmente, por ex.).</p>
            <p>Você detém o poder de desligar os seus cookies, nas opções do seu browser, ou efetuando alterações nas ferramentas de programas Anti-Virus, como o Norton Internet Security. No entanto, isso poderá alterar a forma como interage com o nosso website, ou outros websites. Isso poderá afetar ou não permitir que faça logins em programas, sites ou fóruns da nossa e de outras redes.</p>
      
            <h2>Ligações a Sites de terceiros</h2>
            <p>As ligações para outros sites, os quais, a nosso ver, podem conter informações/ferramentas úteis para os nossos visitantes. A nossa política de privacidade não é aplicada a sites de terceiros, pelo que, caso visite outro site a partir do nosso deverá ler a politica de privacidade do mesmo.</p>
            <p>Não nos responsabilizamos pela política de privacidade ou conteúdo presente nesses mesmos sites</p>
        </section>
    </main>
@endsection