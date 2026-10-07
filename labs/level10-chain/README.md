# Level 10 — Exploit Chain

Difficulty: EXPERT

Workflow:
1. Start at the public or recon stage.
2. Discover the internal stage.
3. Capture the lab token.
4. Replay the token against the final simulated sink.
5. Record the flag and explain the chain.

Flag: SQUAD{MULTI_STAGE_EXPLOIT_CHAIN_2026}

The final stage is simulated. No shell, OS command, credential, or host access is provided.

Defensive lesson: validate trust boundaries at every stage instead of assuming an upstream component already authenticated or sanitized the request.