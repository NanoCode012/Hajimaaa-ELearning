# Hajimaaa-ELearning

An e-learning platform built for both centralized and distributed solutions.

## Setup

1. Copy `conf.php.sample` to `conf.php` and modify the values
1. Import the `elearning.sql` inside the `sql` directory
1. Start the web service

## How to develop

1. Create a new branch from the `main` branch
1. Write the `body` section of the page's code and place it within the `pages` directory
1. Connect other pages to it by using `href="?p=name"` or equivalent of the `name.php` file
1. When it is ready, create a Pull Request and wait for someone to review
1. Make changes to the branch if necessary
1. When the branch has been merged, delete that branch and start over from Step 1

## Prettier

```bash
npm install --save-dev
npm run prettier
```

## License

Do not share to others without permission!
