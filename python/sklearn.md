# scikit-learn

## import

```python
import numpy as np
import pandas as pd
from sklearn.model_selection import train_test_split
from sklearn.linear_model import LinearRegression
from sklearn.metrics import mean_absolute_error,mean_squared_error
```

## Load Data File

```python
# data.csv (200 records)
# ----------------------
# x1,x2,x3,y
# 230,37,69,22
# 44,39,45,10
# 17,45,69,9
# ...

df = pd.read_csv('data.csv')
```

## Split Data to Train and Test

```python
X = df.drop('y', axis=1)
y = df['y']

X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.3, random_state=42)
# test_size = 0.3
# - len(df)      = 200
# - len(X_train) = 140
# - len(X_test)  =  60  (30%)
```

## Model

```python
model = LinearRegression()
model.fit(X_train, y_train)
```

## Predict

```python
y_predict = model.predict(X_test)
# [16.5153963  21.17822792 21.54107158, ...
```

## Verify errors

```python
mean_absolute_error(y_test, y_predict)
# 1.5016692224549086

np.sqrt(mean_squared_error(y_test, y_predict)))
# 1.9475372043446385
```
