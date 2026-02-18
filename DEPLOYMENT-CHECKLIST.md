# Pre-Push Checklist

Before pushing to GitHub and deploying to Hostinger, verify:

## ✅ Sensitive Files (Not Committed)
- [ ] `.env` – In .gitignore (contains database credentials)
- [ ] `config/database.php` – In .gitignore (contains credentials)
- [ ] No API keys, secrets, or passwords in committed files

## ✅ SvelteKit Removed
- [x] All `src/` SvelteKit files removed
- [x] `package.json`, `package-lock.json` removed
- [x] `svelte.config.js`, `vite.config.ts`, `tsconfig.json` removed
- [x] `.github/workflows/deploy.yml` (GitHub Pages) removed
- [x] `.prettierrc`, `.prettierignore`, `.npmrc` removed
- [x] `update_rules.sh`, `sveltekit.mdc` removed

## ✅ Ready for Hostinger
- [ ] `.htaccess` included (handles clean URLs)
- [ ] `sql/setup-hostinger.sql` ready for phpMyAdmin import
- [ ] `.env.example` included (copy to `.env` on server with Hostinger DB credentials)

## Push Commands
```bash
git add .
git status   # Verify config/database.php and .env are NOT staged
git commit -m "Migrate to PHP/MySQL, remove SvelteKit, add Hostinger deployment"
git push origin main
```
