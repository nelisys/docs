# getopt

```bash
usage() {
    echo "Usage:\n$ $0 [-c <count>] [-p <process>] <name>" 1>&2;
    exit 1;
}

while getopts ":c:p:" o; do
    case "${o}" in
        c)
            c=${OPTARG}
            ;;
        p)
            p=${OPTARG}
            ;;
        *)
            usage
            ;;
    esac
done

shift $((OPTIND-1))

name=$1

if [ -z "${c}" ] || [ -z "${name}" ]; then
    usage
fi
```
