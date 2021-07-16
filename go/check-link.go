package main

import (
    "fmt"
    "net/http"
    "time"
)

func main() {
    c := make(chan string)

    links := []string {
        "http://amazon.com",
        "http://facebook.com",
        "http://google.com",
    }

    for _, link := range links {
        go func(l string) {
            checkLink(l, c)
            time.Sleep(5 * time.Second)
            checkLink(l, c)
        }(link)
    }

    for i := 0; i < 2 * len(links); i++ {
        fmt.Println(i, ":")
        fmt.Println(<-c) // wait for the Routine to send message via the Channel
    }
}

func checkLink(link string, c chan string) {
    _, err := http.Get(link)

    if err != nil {
        fmt.Println(link, "might be down!")
        c<-"might be down."
        return
    }

    fmt.Println(link, "is up!")
    c<-"is up."
}
