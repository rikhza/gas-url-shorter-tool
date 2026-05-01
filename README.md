# GAS URL Shorter

GAS is a self-hosted link intelligence platform: short links with useful analytics, not vanity metrics. It is built for indie builders, communities, marketers, and internal teams that need practical campaign tracking without handing every click to a hosted third-party shortener.

## Why GAS

GAS should be positioned as a privacy-friendly shortener with operational analytics, not as "a shortener made with a PHP framework." The value is the insight around each link: where clicks come from, which devices people use, which campaigns are working, and how teams organize their links.

## Feature Focus

| Area | Features people care about |
| --- | --- |
| Core usability | Custom slugs, link expiration, bulk shortening, QR code generation per short URL |
| Analytics | Click count, referrer, device, browser, country, and a visual dashboard |
| Collaboration | Workspaces/teams, tags per link, notes/campaign labels, CSV export |
| Privacy/self-hosted | Self-hosted deployment, public shortening without forced signup when enabled, practical non-invasive analytics |

## Product Headline

Short links with useful analytics, not vanity metrics.

## Niche Differentiator

Campaign tracking for indie builders and internal teams. Many open source shorteners stop at shortening plus basic stats; GAS can be stickier by helping people manage campaigns, labels, notes, QR assets, and exportable reporting.

## Local Development With Docker

The current PHP application uses `mysqli`, so the runnable Docker setup uses MariaDB. This keeps dev setup zero-touch while matching the existing SQL schema and query style.

```bash
cp .env.example .env
docker compose up --build
```

Open `http://localhost:8080`.

Default seeded admin from `docker/seed/001-gas.sql`:

- Email: `admin`
- Password: `admin`

If you change `SITE_URL` or exposed ports, update `.env` before starting the stack.

This repository is Docker-first and does not use the web installer flow anymore.

## Deployment Notes

For a normal Docker deployment, use the `app` image and point these variables at your production database:

```env
DATABASE_SERVER=your-db-host
DATABASE_USERNAME=your-db-user
DATABASE_PASSWORD=your-db-password
DATABASE_NAME=your-db-name
SITE_URL=https://your-short-domain.example/
```

If your database runs outside Docker, remove or ignore the bundled `db` service and set the variables above in your runtime environment.

## Performance Notes

The Docker image includes sensible defaults for PHP runtime performance with `mysqli` stacks:

- OPcache enabled and tuned for production-like behavior
- JIT disabled for stability with this codebase
- Apache compression and cache headers enabled
