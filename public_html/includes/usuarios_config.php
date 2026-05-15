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
            'mode' => 'article',
            'requirement' => 'CC-APP-002-COM',
            'content_html' => '<p>TVMAR INTERNET utiliza equipos ONT/ONU para entregar el servicio de fibra óptica al hogar. Estos equipos convierten la señal óptica de la red GPON/XPON en conexión de red local, Wi-Fi y, según el modelo instalado, servicio telefónico o puertos adicionales.</p><div class="tvmar-tech-hero"><div><span>ONT/ONU FTTH</span><h3>Equipos utilizados en instalaciones de fibra óptica</h3><p>Las características pueden variar según firmware, configuración del operador y disponibilidad del modelo instalado.</p></div><i class="fa-wifi"></i></div><div class="tvmar-tech-grid"><article class="tvmar-tech-card"><div class="tvmar-tech-card__head"><span class="tvmar-tech-chip">Huawei</span><h3>EchoLife HS8545M5</h3><p>ONT/ONU GPON para conexiones FTTH.</p></div><dl><dt>Puertos LAN</dt><dd>1 Gigabit Ethernet (GE) + 3 Fast Ethernet (FE)</dd><dt>Telefonía</dt><dd>1 puerto POTS</dd><dt>Wi-Fi</dt><dd>2.4 GHz</dd><dt>USB</dt><dd>1 puerto USB</dd><dt>Compatibilidad</dt><dd>GPON/XPON según firmware y operador</dd></dl><div class="tvmar-tech-note"><strong>Importante:</strong> este modelo normalmente solo maneja Wi-Fi 2.4 GHz, no Wi-Fi 5 GHz.</div><div class="tvmar-tech-alias"><h4>También puede aparecer como</h4><ul><li>Huawei EchoLife HS8545M5</li><li>Huawei HS8545M5 ONT</li><li>Huawei HS8545M5 XPON ONU</li></ul></div></article><article class="tvmar-tech-card tvmar-tech-card--accent"><div class="tvmar-tech-card__head"><span class="tvmar-tech-chip">C-Data</span><h3>Serie R850</h3><p>ONUs/ONTs XPON con Wi-Fi 6 doble banda.</p></div><dl><dt>Modelos conocidos</dt><dd>FD514GS3-R850, FD614GS3-R850, FD714GS3-R850</dd><dt>Tecnología</dt><dd>XPON (GPON/EPON)</dd><dt>Wi-Fi</dt><dd>Wi-Fi 6 doble banda 2.4 GHz y 5 GHz</dd><dt>Velocidad inalámbrica</dt><dd>AX3000</dd><dt>Puertos LAN</dt><dd>4 puertos Gigabit Ethernet</dd><dt>Compatibilidad</dt><dd>OLT Huawei, ZTE y FiberHome</dd></dl><div class="tvmar-tech-alias"><h4>Diferencias frecuentes por referencia</h4><ul><li>FD514GS3-R850: 4 GE + Wi-Fi 6 AX3000 XPON ONU</li><li>FD614GS3-R850: versión con puerto telefónico POTS/VoIP</li><li>FD714GS3-R850: versión con CATV + Wi-Fi 6 AX3000</li></ul></div></article></div><div class="tvmar-tech-footer"><h3>Nota para usuarios</h3><p>La velocidad percibida por Wi-Fi depende del plan contratado, distancia al equipo, interferencias, capacidad del dispositivo conectado y cantidad de equipos usando la red. Para pruebas de velocidad más confiables se recomienda conectar un computador por cable Ethernet al equipo instalado.</p></div>',
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
            'content_html' => '<p>TVMAR INTERNET presta servicio de acceso a internet en zonas urbanas y rurales de Mariquita, Falan y Venadillo, de acuerdo con la disponibilidad técnica de red. La calidad del servicio depende de la tecnología instalada, el plan contratado, el estado de los equipos del usuario y las condiciones de la red interna del hogar o empresa.</p><p>No se consideran interrupciones atribuibles al servicio las fallas ocasionadas por energía eléctrica del usuario, daños en red interna, equipos propios, vandalismo, alteraciones no autorizadas o fuerza mayor.</p><div class="tvmar-coverage"><h3>Zonas de cobertura</h3><div class="tvmar-coverage-grid"><section><h4>Mariquita - Barrios</h4><ul><li>Barrios Unidos</li><li>Ciudadela</li><li>Renacer</li><li>Mutis</li><li>Jardín</li><li>Santa Lucía</li><li>Comuneros</li><li>Centro</li><li>Ermita</li><li>Carmen</li><li>Concordia</li><li>Villa Holanda</li><li>Dorado</li><li>Villa del Sol</li><li>San Carlos</li><li>San Lorenzo</li></ul></section><section><h4>Mariquita - Veredas</h4><ul><li>Pantano Grande</li><li>Llano</li><li>Caucho</li><li>Parroquia</li><li>Porvenir</li><li>Lomas</li><li>San Juan</li><li>San Diego</li><li>San Jerónimo</li></ul></section><section><h4>Venadillo</h4><ul><li>Palmarosa</li><li>Santa Bárbara</li><li>Centro</li></ul></section><section><h4>Falan</h4><ul><li>Telecom</li><li>Santa Bárbara</li><li>Centro</li><li>La Rica</li><li>Lajosa</li><li>Cúcuta</li></ul></section></div></div>',
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
