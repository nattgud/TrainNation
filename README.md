# TrainNation

**TrainNation** is a browser-based training platform for practicing programming concepts, built entirely with **PHP**, **JavaScript**, **HTML**, and **CSS**.  
The project demonstrates how interactive coding exercises can be implemented without external frameworks or dependencies.

## Overview
TrainNation provides:
- A collection of short, focused programming tasks (e.g., Git commands, JavaScript basics).  
- Live code execution in an isolated **iframe** sandbox.  
- Instant feedback (correct / incorrect).  
- A simple level-based progression system.

The system runs locally with standard web technologies and does not require any database or build tools.

## Technical Notes
- **Frontend:** Pure JavaScript, CSS, and HTML  
- **Backend:** PHP handles exercise loading, checking, and response generation  
- **Communication:** AJAX / `fetch` and `postMessage` between pages and the sandbox iframe  
- **Structure:** Organized under `/files/` (separate modules for JS logic and PHP endpoints)

## Purpose
TrainNation is not a public service or commercial product.  
It’s a **personal learning and demonstration project** aimed at showing:
- How to build an interactive coding environment from scratch  
- How PHP and JavaScript can communicate securely  
- How sandboxed code execution can be used for simple training interfaces

## Status
Work in progress.  
Functionality and file structure may change over time as features evolve.

## Author
Developed by **nattgud**.  
The repository exists to demonstrate implementation ideas and provide a clear, minimal example of how such a system can be built.
