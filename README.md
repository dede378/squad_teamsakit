# SQUAD TeamSakit — Public Web Pentest Training Lab

An isolated Docker-based web security training lab for authorized testing.

## Status

This repository is the source for a deliberately vulnerable training environment. Keep it private while building and auditing it.

## Planned labs

- Reflected and stored XSS
- SQL injection
- CSRF
- IDOR / access-control mistakes
- Authentication weaknesses
- Open redirect
- Parameter discovery
- Security-header misconfiguration

## Local deployment

Requirements: Docker Engine and Docker Compose.

```bash
cp .env.example .env
docker compose up -d --build
docker compose ps
```

Local endpoint: http://127.0.0.1:8080

## Pentest workflow

1. RustScan / Nmap — service discovery
2. Katana / GhostCrawl — crawling
3. Gobuster / FFuf — content discovery
4. Arjun — parameter discovery
5. Nikto / Nuclei — web checks
6. XSStrike — XSS validation
7. SQLmap — SQLi validation on the dedicated SQLi lab
8. Hydra — keep password-auditing targets local/private
9. Metasploit — keep exploit-service targets local/private

Use only against this lab or systems for which you have explicit authorization.

See SECURITY.md.
