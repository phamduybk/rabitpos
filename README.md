# Rabit POS — Synology DSM 7 packages

Free point-of-sale and store management that runs entirely on your NAS.
Installation guide (English / Tiếng Việt): https://rabitpos.com/synology/

| File | DSM | For |
|---|---|---|
| `rabitpos-5.1.2-26093016-x86_64.spk` | 7.2 or later | Intel / AMD NAS (x86_64) |
| `rabitpos-5.1.2-26093016-armv8.spk` | 7.2 or later | ARM 64-bit NAS (armv8) |
| `rabitpos-5.1.1-26092923-x86_64.spk` | 7.0 and 7.1 | Intel / AMD NAS (x86_64) |
| `rabitpos-5.1.1-26092923-armv8.spk` | 7.0 and 7.1 | ARM 64-bit NAS (armv8) |

- 5.1.2 opens at `https://<your-NAS-domain>/rabitpos/`, like other DSM apps. It also works on the DSM address and on ports 80/443. `http://<NAS-address>:8888/` still works on the local network.
- 5.1.1 opens at `http://<NAS-address>:8888/`.

Install: Package Center → Manual Install → choose the file for your NAS.
For automatic updates, add the package source `https://rabitpos.com/synology/` in Package Center → Settings → Package Sources.

Website: https://rabitpos.com · Support: admin@rabitpos.com
