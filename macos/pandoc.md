# Pandoc

## Installation

```
brew install pandoc
```

## Convert to pdf

```
brew install --cask mactex
```

```
pandoc mybook.md \
    --pdf-engine=xelatex \
    --variable mainfont="TH Sarabun New" \
    --variable version="1.0" \
    --variable title="My Title" \
    --variable author="My Author" \
    --variable date="29 Jan 2021" \
    --variable geometry="left=1cm,right=1cm,top=2cm,bottom=2cm" \
    --toc \
    -o mybook.pdf
```
