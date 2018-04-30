# transaction_mining
Magento 2 module: Search the transaction database for frequently occurring combinations of products.

## This module answers the question: Which products are often sold together?
This module implements the [PHP machine learning library](https://github.com/php-ai/php-ml). It uses an association rule algorithm called apriori to find association rules between products. The result: A list of products that are often sold together.

There are two important metrics that are shown in association rule grid (transaction mining -> view order association rules. In the admin grid). These are:
* support. The percentage of the total transactions that these products occur in. 
* Confidence. If all of the products in the antecedent occur, how often does the consequent occur?
The confidence is comparable to correlation. It's the percentage of times the antecendent and consequent occur together.

