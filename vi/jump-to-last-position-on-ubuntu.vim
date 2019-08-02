# config vi to jump to last position on ubuntu

```console
$ sudo vi /etc/vim/vimrc
...
" Uncomment the following to have Vim jump to the last position when
" reopening a file
if has("autocmd")
  au BufReadPost * if line("'\"") > 1 && line("'\"") <= line("$") | exe "normal! g'\"" | endif
endif
...
```
