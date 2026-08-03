# Te Conozco Chacarita — Festival (2ª edición)

Sitio del festival en WordPress. Este repo **es** el child theme "Chacarita
Child" (los archivos del tema están en la raíz del repo, no en una subcarpeta,
porque cPanel Git Version Control clona el repo completo dentro de
`wp-content/themes/chacarita-child/` en el servidor). El core de WordPress,
plugins y la base de datos viven solo en Donweb.

## Stack

- Tema base: **Astra** (gratuito)
- Page builder: **Elementor** (gratuito) — para Manifiesto, Participar, Contacto
- **Advanced Custom Fields** (gratuito) — campos del directorio "El Barrio"
- Child theme custom (`chacarita-child`) con el CPT `barrio_local` para el
  catálogo de locales/emprendedores

## Secciones del sitio

1. Manifiesto — página Elementor
2. Mapa — página con embed de Google My Maps
3. El Barrio — catálogo (CPT `barrio_local`, código en este repo)
4. Participar — link a formulario de Google
5. Contacto — página Elementor

## Plugins a instalar en Donweb

- Astra (tema)
- Elementor
- Advanced Custom Fields

## Deploy

Donweb (cPanel/Ferozo) tiene la sección **Git Version Control**, que clona este
repo directo en el servidor. No se usa FTP.

- **Repositorio:** `https://github.com/soycruche/te-conozco-chacarita.git` (URL HTTPS,
  no SSH — el repo es público y así no hace falta configurar una deploy key)
- **Rama:** `main`
- **Directorio (staging actual):** `stage2026/wp-content/themes/chacarita-child`

Después de cada push a `main`, entrar a cPanel → Git → el repo → "Actualizar
desde remoto" y "Implementar confirmación HEAD" para traer los cambios.

## Desarrollo

No hay entorno WordPress local: el child theme se edita como archivos PHP
sueltos y se prueba directo en Donweb al pushear a `main`.

## Pendiente

- [x] Instalar WordPress en Donweb (staging en `stage2026/`)
- [x] Configurar Git Version Control en cPanel apuntando al child theme
- [ ] Instalar y activar Astra + Elementor + ACF en `stage2026`
- [ ] Activar el child theme `chacarita-child`
- [ ] Confirmar campos definitivos de cada local en "El Barrio"
- [ ] Migrar identidad visual (colores, tipografías, logo) de la 1ª edición
- [ ] Promover de `stage2026` a producción
