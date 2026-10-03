# Rabit POS — Synology DSM 7 packages

Free point-of-sale and store management that runs entirely on your NAS.
Installation guide (English / Tiếng Việt / 中文 / ລາວ / ខ្មែរ / ไทย): https://rabitpos.com/synology/

| File | DSM | For |
|---|---|---|
| `rabitpos-5.3.1-26100400-x86_64.spk` | 7.2 or later | Intel / AMD NAS (x86_64) — latest |
| `rabitpos-5.3.1-26100400-armv8.spk` | 7.2 or later | ARM 64-bit NAS (armv8) — latest |
| `rabitpos-5.3.0-26100309-x86_64.spk` | 7.2 or later | previous version |
| `rabitpos-5.3.0-26100309-armv8.spk` | 7.2 or later | previous version |
| `rabitpos-5.1.1-26092923-x86_64.spk` | 7.0 and 7.1 | Intel / AMD NAS (x86_64) |
| `rabitpos-5.1.1-26092923-armv8.spk` | 7.0 and 7.1 | ARM 64-bit NAS (armv8) |

- 5.3.1 is a maintenance release (63 fixes: money rounding, returns, split payments, large-store reports, security hardening).
- 5.3.0 adds Lao, Khmer and Thai interfaces and the kip, riel and baht currencies.
- 5.2.1 adds per-store currency (Chinese yuan ¥ with two decimals, US dollar, euro, yen; Vietnamese dong unchanged).
- 5.2.0 adds a Simplified Chinese (简体中文) interface next to English and Vietnamese.
- 5.3.1, 5.3.0, 5.2.1 and 5.2.0 open at `https://<your-NAS-domain>/rabitpos/`, like other DSM apps. It also works on the DSM address and on ports 80/443. `http://<NAS-address>:8888/` still works on the local network.
- 5.1.1 opens at `http://<NAS-address>:8888/`.

Install: Package Center → Manual Install → choose the file for your NAS.
For automatic updates, add the package source `https://rabitpos.com/synology/` in Package Center → Settings → Package Sources.

Website: https://rabitpos.com · Support: admin@rabitpos.com
