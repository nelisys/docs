# pandoc

## md file

`input.md`

```md
---
title: My Book
author: Supasin S.
date: \today
geometry: 'left=2cm,right=2cm,top=2cm,bottom=2cm'
mainfont: Sarabun
---

\pagebreak
```

## convert to pdf

```sh
pandoc -s --toc --number-sections \
    --pdf-engine=xelatex \
    -c style.css \
    -o my-book.pdf \
    input.md
```
