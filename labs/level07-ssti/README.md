# Level 07 — SSTI

Difficulty: HARD

Goal: identify server-side template injection and retrieve the challenge flag.

The lab simulates template evaluation with a tiny allowlisted renderer. It does not execute PHP, shell commands, or access the host filesystem.

Hints:
1. Test whether expressions are evaluated.
2. Think about template context.
3. Inspect how the application treats a special context value.

Flag: SQUAD{SSTI_TEMPLATE_CONTEXT_2026}

Defensive fix: never concatenate untrusted input into a template. Use a real template engine with escaping and a strict sandbox.