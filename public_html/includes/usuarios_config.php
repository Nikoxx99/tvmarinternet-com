<?php
declare(strict_types=1);

function tvmar_h(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function tvmar_document_root(): string
{
    return dirname(__DIR__) . '/documentos/usuarios';
}

function tvmar_content_json_path(): string
{
    return tvmar_document_root() . '/contenido.json';
}

function tvmar_default_sections(): array
{
    return [
        'medidor-velocidad' => [
            'slug' => 'medidor-velocidad',
            'title' => 'Medidor de velocidad',
            'summary' => 'Consulta velocidad de descarga, velocidad de carga, latencia, IP origen, fecha y hora de la medición.',
            'icon' => 'fa-dashboard',
            'href' => 'medidor-velocidad.php',
            'mode' => 'iframe',
            'iframe_url' => 'https://www.nperf.com/es/',
            'action_label' => 'Abrir medidor',
            'requirement' => 'CC-APP-001-COM',
            'bullets' => [
                'Realiza la prueba desde un computador conectado por cable cuando sea posible.',
                'Cierra descargas, videollamadas y aplicaciones que consuman internet antes de medir.',
                'El resultado puede variar por WiFi, cantidad de equipos conectados y estado del dispositivo.'
            ],
        ],
        'gestion-trafico' => [
            'slug' => 'gestion-trafico',
            'title' => 'Medidas de gestión de tráfico',
            'summary' => 'Políticas razonables y no discriminatorias para preservar la seguridad, integridad y estabilidad de la red.',
            'icon' => 'fa-sitemap',
            'href' => 'gestion-trafico.php',
            'mode' => 'article',
            'requirement' => 'DS-NET-004-COM',
            'content_html' => '<p>TVMAR INTERNET aplica medidas de gestión de tráfico orientadas a proteger la red, mitigar congestión, preservar la seguridad del servicio y asegurar una experiencia estable para sus usuarios. Estas medidas se ejecutan bajo criterios técnicos generales y no discriminan proveedores, contenidos, servicios, aplicaciones o protocolos específicos.</p><p>Cuando sea necesario, se podrán priorizar clases genéricas de tráfico según requerimientos técnicos como latencia, retardo o continuidad del servicio. También se podrán bloquear contenidos ordenados por autoridad competente, listados oficiales de material de abuso sexual infantil, páginas de juegos de suerte y azar no autorizadas y direcciones sujetas a decisiones judiciales o administrativas.</p><p>Las medidas buscan cumplir la regulación aplicable sobre neutralidad de red, seguridad de la información, protección de menores y continuidad del servicio.</p>',
        ],
        'pqrs' => [
            'slug' => 'pqrs',
            'title' => 'Radicar PQRS',
            'summary' => 'Formulario para presentar peticiones, quejas, reclamos, recursos o sugerencias y recibir un número de radicado.',
            'icon' => 'fa-list-alt',
            'href' => 'pqrs.php',
            'mode' => 'pqrs',
            'requirement' => 'Atención de usuarios',
        ],
        'mantenimientos' => [
            'slug' => 'mantenimientos',
            'title' => 'Mantenimientos programados',
            'summary' => 'Consulta avisos de intervenciones programadas sobre la red y ventanas de mantenimiento.',
            'icon' => 'fa-wrench',
            'href' => 'mantenimientos-programados.php',
            'mode' => 'documents',
            'requirement' => 'IC-DRA-003-COM',
            'empty_message' => 'En este momento no hay mantenimientos programados publicados.',
        ],
        'contratos' => [
            'slug' => 'contratos',
            'title' => 'Contratos',
            'summary' => 'Contrato de prestación del servicio, anexos, condiciones comerciales y documentos relacionados.',
            'icon' => 'fa-file-text-o',
            'href' => 'contratos.php',
            'mode' => 'documents',
            'requirement' => 'Información contractual',
            'file' => 'contrato.pdf',
        ],
        'derechos' => [
            'slug' => 'derechos',
            'title' => 'Haz valer tus derechos',
            'summary' => 'Información para que los usuarios conozcan y ejerzan sus derechos frente al servicio contratado.',
            'icon' => 'fa-balance-scale',
            'href' => 'haz-valer-tus-derechos.php',
            'mode' => 'documents',
            'requirement' => 'Régimen de protección de usuarios',
        ],
        'tecnologias' => [
            'slug' => 'tecnologias',
            'title' => 'Tecnologías',
            'summary' => 'Información técnica sobre las tecnologías usadas para llevar el servicio hasta hogares y empresas.',
            'icon' => 'fa-wifi',
            'href' => 'tecnologias.php',
            'mode' => 'documents',
            'requirement' => 'CC-APP-002-COM',
        ],
        'internet-sano' => [
            'slug' => 'internet-sano',
            'title' => 'Internet sano',
            'summary' => 'Buenas prácticas, prevención de contenidos ilegales y canales de denuncia para proteger a menores de edad.',
            'icon' => 'fa-shield',
            'href' => 'internet-sano.php',
            'mode' => 'article',
            'requirement' => 'BM-MAS-001-COM',
            'content_html' => '<p>TVMAR INTERNET se acoge a las disposiciones sobre Internet Sano, prevención de explotación de menores de edad en redes electrónicas y bloqueo de material ilegal. Invitamos a los usuarios a denunciar contenidos de abuso sexual infantil y a usar herramientas de control parental en los hogares.</p><p>Canales de referencia: MinTIC, Fiscalía General de la Nación, DIJIN, ICBF y Te Protejo Colombia. En caso de identificar contenidos ilegales, denúncialos ante las autoridades competentes.</p>',
        ],
        'seguridad-red' => [
            'slug' => 'seguridad-red',
            'title' => 'Seguridad de la red',
            'summary' => 'Riesgos de seguridad, recomendaciones para el usuario y medidas para preservar la red.',
            'icon' => 'fa-user-secret',
            'href' => 'seguridad-red.php',
            'mode' => 'article',
            'requirement' => 'DS-NET-002-COM / DS-SRI',
            'content_html' => '<p>Los usuarios deben mantener sus equipos actualizados, usar contraseñas seguras en sus redes WiFi, evitar abrir enlaces sospechosos y revisar periódicamente los dispositivos conectados. Riesgos como virus, phishing, robo de identidad y software malicioso pueden afectar la navegación y generar tráfico no deseado.</p><p>TVMAR INTERNET adelanta acciones técnicas para preservar la seguridad e integridad de la red, sin reemplazar las medidas de seguridad que cada usuario debe aplicar en sus dispositivos y redes internas.</p>',
        ],
        'calidad-cobertura' => [
            'slug' => 'calidad-cobertura',
            'title' => 'Calidad y cobertura',
            'summary' => 'Condiciones de calidad del servicio ofrecido, disponibilidad, soporte y zonas de cobertura.',
            'icon' => 'fa-map-marker',
            'href' => 'calidad-cobertura.php',
            'mode' => 'article',
            'requirement' => 'CC-APP-002-COM',
            'content_html' => '<p>TVMAR INTERNET presta servicio de acceso a internet en zonas urbanas y rurales de Mariquita, Falan y Venadillo, de acuerdo con la disponibilidad técnica de red. La calidad del servicio depende de la tecnología instalada, el plan contratado, el estado de los equipos del usuario y las condiciones de la red interna del hogar o empresa.</p><p>No se consideran interrupciones atribuibles al servicio las fallas ocasionadas por energía eléctrica del usuario, daños en red interna, equipos propios, vandalismo, alteraciones no autorizadas o fuerza mayor.</p>',
        ],
        'interconexion-bloqueos' => [
            'slug' => 'interconexion-bloqueos',
            'title' => 'Bloqueos e interconexión',
            'summary' => 'Información sobre bloqueos por autoridad competente, Coljuegos, DIJIN y obligaciones técnicas de red.',
            'icon' => 'fa-ban',
            'href' => 'interconexion-bloqueos.php',
            'mode' => 'article',
            'requirement' => 'OB-BJS / OB-BUR / IX-NIX',
            'content_html' => '<p>TVMAR INTERNET ejecuta bloqueos de contenidos, URL o dominios cuando exista orden judicial, administrativa o listado oficial aplicable. Esto incluye páginas de juegos de suerte y azar no autorizadas reportadas por Coljuegos y contenidos ilegales reportados por las autoridades competentes.</p><p>La empresa mantiene recursos técnicos para operar su red, gestionar tráfico y atender obligaciones de interconexión que le sean aplicables según la regulación vigente.</p>',
        ],
        'privacidad' => [
            'slug' => 'privacidad',
            'title' => 'Protección de datos',
            'summary' => 'Tratamiento de datos personales, habeas data y canales para solicitudes asociadas.',
            'icon' => 'fa-lock',
            'href' => 'proteccion-datos.php',
            'mode' => 'documents',
            'requirement' => 'Habeas data',
            'file' => 'habeas-data.pdf',
        ],
    ];
}

function tvmar_sections(): array
{
    $sections = tvmar_default_sections();
    $path = tvmar_content_json_path();
    if (is_file($path)) {
        $json = json_decode((string) file_get_contents($path), true);
        if (is_array($json)) {
            foreach ($json as $slug => $extra) {
                if (isset($sections[$slug]) && is_array($extra)) {
                    $sections[$slug] = array_replace($sections[$slug], $extra);
                }
            }
        }
    }
    return $sections;
}

function tvmar_section(string $slug): ?array
{
    $sections = tvmar_sections();
    return $sections[$slug] ?? null;
}

function tvmar_save_section_updates(array $updates): bool
{
    $path = tvmar_content_json_path();
    if (!is_dir(dirname($path))) {
        mkdir(dirname($path), 0755, true);
    }

    $current = [];
    if (is_file($path)) {
        $decoded = json_decode((string) file_get_contents($path), true);
        if (is_array($decoded)) {
            $current = $decoded;
        }
    }

    foreach ($updates as $slug => $values) {
        $current[$slug] = array_replace($current[$slug] ?? [], $values);
    }

    return file_put_contents($path, json_encode($current, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)) !== false;
}
