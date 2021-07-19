# NumPy

## import

```python
import numpy as np
```

## Init array

```python
a = np.zeros(4)
# [0. 0. 0. 0.]

a = np.ones(3) * 5
# [5. 5. 5.]

a = np.arange(9)
# [0 1 2 3 4 5 6 7 8]

a = np.arange(1, 10, 2)
# [1 3 5 7 9]

a = np.linspace(0, 1, 5)
# [0.   0.25 0.5  0.75 1.  ]
```

## Reshape

```python
a = np.arange(9).reshape(3, 3)
# [[0 1 2]
#  [3 4 5]
#  [6 7 8]]
```

## Random

### rand()

```python
a = np.random.rand()
# 0.8098792279828086

a = np.random.rand(1)
# [0.96527205]

a = np.random.rand(3)
# [0.81516124 0.86574444 0.54870481]
```

### randn() - standard normal distribution

```python
a = np.random.randn(4)
# [-0.61789901  0.99746505  2.26639675  0.00639646]
```

### Seed

```python
# when specify speed, the random output will be the same
np.random.seed(1)
np.random.rand()
# 0.417022004702574
```

## Index Selection

```python
a = np.arange(1, 10).reshape(3,3)
# [[1 2 3]
#  [4 5 6]
#  [7 8 9]]

a[1, 1]
# 5

a[1][1]
# 5

a[1]
# [4 5 6]

a[1:]
# [[4 5 6]
#  [7 8 9]]

a[0:, 1]
# [2 5 8]
```

## Operation

```python
a = np.arange(1, 10).reshape(3,3)
# [[1 2 3]
#  [4 5 6]
#  [7 8 9]]

a.sum()
# 45

a.std()
# 2.581988897471611
```
