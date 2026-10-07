# EXIM Security Lab

## Scope

This is an Exim/SMTP-inspired vulnerability lab. It intentionally contains a
command-injection flaw in the simulated transport layer.

It is designed for the SQUAD // CYBER LAB environment and does **not** install
or expose a vulnerable Exim daemon.

## Goal

Obtain the lab flag through the vulnerable SMTP recipient parser, then explain:

- where untrusted SMTP input reaches the transport layer;
- why shell metacharacters are dangerous;
- how strict recipient validation prevents the issue;
- why process arguments should be passed without shell interpretation.

## Expected impact

Successful exploitation reveals the training flag:

`SQUAD{EXIM_LAB_COMMAND_INJECTION_2026}`

The simulator intentionally recognizes command-injection patterns and returns a
flag instead of executing an operating-system command.

## Defensive fix

A real implementation should never construct shell commands from SMTP-controlled
strings. Use structured process arguments, strict validation, and an allowlist
for supported recipient syntax.
