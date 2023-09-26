<p align="center">
<img src="https://github.com/FrancineHuang/shokuka/assets/105546843/79611e46-16cb-4a2c-9274-d0a3b18d96f7" alt="Banner">

</p>

## 作りたいものは？

**本格！手軽！中華料理のレシピ投稿アプリーー「食華（しょくか）」**

- 背景：私はグルメが大好きな中国人です。5年ほど前、私は日本に来たばかりの頃、日々本格中華料理を恋しくなりました。その後、コロナ禍の影響の下で自宅で料理を作り始め、中華料理を作る習慣をつけました。日本人の友達としょっちゅう中華料理を食べたり、自分が作った中華料理をみんなに一緒にシェアしたり、いい思い出を作りました。しかし、私は自分が好きなことからいろんな問題点を見つけました。
- 問題点1：来日中国人留学生人数の増加によって、池袋や高田馬場では本格中華料理店が増えました。しかし、中華料理店の外食費は母国より高いです。
- 問題点2：東京と比べて、地方の中華物産店と本格中華料理店が少ないので、地方住みの中国人にとって母国の味を食べるのはかなり不便になります。
- 問題点3：中華料理に興味があるが、作り方がわからない日本人もいます。自分が日本のスーパーで手軽に買える食材を買って中華料理をアレンジしたので、自分の工夫点をシェアしたいです。

そのため、日本で手軽に中華料理を食べたい、あるいは作りたい人たちの困りごとを解決したいという思いを込んでこのアプリを作りたいです。

## 使用している技術・ツール

使用している言語、技術とツールをここで挙げます。バージョンは全て**開発時点における**最新バージョンで実装します。
- **Frontend**: HTML / JavaScript / Tailwind CSS
- **Backend**: PHP + Laravel / MySQL(phpMyAdmin)
- **Infrastructure**: Docker / AWS
- **Others**: Git / Github Actions / Figma / VSCode / Lucidchart

## 実装したい機能は？

基本のCRUDを通して、ユーザーがレシピの作成、閲覧、更新と削除ができます。

### ER図

<img src="https://qiita-user-contents.imgix.net/https%3A%2F%2Fqiita-image-store.s3.ap-northeast-1.amazonaws.com%2F0%2F816933%2Fe35ef89b-044b-8981-9b81-2eb32abd875c.png?ixlib=rb-4.0.0&auto=format&gif-q=60&q=75&w=1400&fit=max&s=57990c7a8191370e2ddeca5648fc2b3f" alt="ER Diagram">

各テーブルの名前と意味は以下になります。

| テーブル名  | 意味 |
| ------------- | ------------- |
| Users  | 本アプリを使用しているユーザー  |
| Recipes  | レシピの内容  |
| Steps  | 料理をするためのステップ  |
| Recipe_step  | レシピとステップの中間テーブル  |
| Ingredients  | 料理をするための材料と分量  |
| Recipe_Ingredient  | レシピと材料の中間テーブル  |
| Followers  | フォロワー関連  |
| Likes  | お気に入りレシピ  |
| Comments  | コメント  |

### インフラ設計図

<img src="https://qiita-user-contents.imgix.net/https%3A%2F%2Fqiita-image-store.s3.ap-northeast-1.amazonaws.com%2F0%2F816933%2F5cdbe833-83d3-4635-2892-688d3b31bb6c.png?ixlib=rb-4.0.0&auto=format&gif-q=60&q=75&w=1400&fit=max&s=bca2fe2d7c7ae3a6814bfc252e34d904" alt="ER Diagram">

## 実際の画面

### LP
<img src="https://qiita-user-contents.imgix.net/https%3A%2F%2Fqiita-image-store.s3.ap-northeast-1.amazonaws.com%2F0%2F816933%2F3b486a01-a1dd-84e6-4163-094a796ccbcb.png?ixlib=rb-4.0.0&auto=format&gif-q=60&q=75&w=1400&fit=max&s=7ccc9bdc68ed7cd17dacb881c851c851" alt="LP1">

<img src="https://qiita-user-contents.imgix.net/https%3A%2F%2Fqiita-image-store.s3.ap-northeast-1.amazonaws.com%2F0%2F816933%2Fb083141b-9f25-61cd-a17b-6d66761790f4.png?ixlib=rb-4.0.0&auto=format&gif-q=60&q=75&w=1400&fit=max&s=ef976e287172300dbc8540c955eed897" alt="LP2">

### 新規登録

<img src="https://qiita-user-contents.imgix.net/https%3A%2F%2Fqiita-image-store.s3.ap-northeast-1.amazonaws.com%2F0%2F816933%2Fed6323c2-861c-a9f1-bd8f-61f463cef008.png?ixlib=rb-4.0.0&auto=format&gif-q=60&q=75&w=1400&fit=max&s=e0bc2e308f1f83918ebe10432b608c44" alt="Register">

### ログイン

<img src="https://qiita-user-contents.imgix.net/https%3A%2F%2Fqiita-image-store.s3.ap-northeast-1.amazonaws.com%2F0%2F816933%2F54ef243b-14c8-fac2-75b6-6073fadbb0d0.png?ixlib=rb-4.0.0&auto=format&gif-q=60&q=75&w=1400&fit=max&s=a7def2b60fdb092b9b86750ddb40492a" alt="Login">

### プロフィール

<img src="https://qiita-user-contents.imgix.net/https%3A%2F%2Fqiita-image-store.s3.ap-northeast-1.amazonaws.com%2F0%2F816933%2F2711fed2-6fe1-b724-df36-73962fc143b3.png?ixlib=rb-4.0.0&auto=format&gif-q=60&q=75&w=1400&fit=max&s=17723573002e06c416f1a3ffc6473a31" alt="Profile">

ユーザー自身がお気に入りのレシピのここに載せます。

<img src="https://qiita-user-contents.imgix.net/https%3A%2F%2Fqiita-image-store.s3.ap-northeast-1.amazonaws.com%2F0%2F816933%2Fb56b4896-b760-c570-953e-df5af75a3b86.png?ixlib=rb-4.0.0&auto=format&gif-q=60&q=75&w=1400&fit=max&s=e67a848df4c018ce005ac1bccc20376b" alt="Favorite">

## レシピ作成

それでは、麻婆豆腐の作り方を書いてみようと思います！

実際にレシピを書くためきっと長い文章を書く必要があるでしょう。

機能を紹介するため、あくまでも適当なレシピを書きますので、ご了承ください。

<img src="https://qiita-user-contents.imgix.net/https%3A%2F%2Fqiita-image-store.s3.ap-northeast-1.amazonaws.com%2F0%2F816933%2Fe6e7500c-0dce-58ab-4c31-d0e88424297f.png?ixlib=rb-4.0.0&auto=format&gif-q=60&q=75&w=1400&fit=max&s=bc910ea95e42688d5e5dd957969074f9" alt="Make1">

レシピのカバー写真をアップロードし、タイトルと紹介文を入力します。

<img src="https://qiita-user-contents.imgix.net/https%3A%2F%2Fqiita-image-store.s3.ap-northeast-1.amazonaws.com%2F0%2F816933%2Fe1a729ce-a740-6b0e-7c36-3ae5e6445bbc.png?ixlib=rb-4.0.0&auto=format&gif-q=60&q=75&w=1400&fit=max&s=ca0c2f28ff9eee307fe1e17bbf94394c" alt="Make2">

次は材料と分量を追加します。

素のJavaScriptで動的な入力欄を作成したので、材料の追加、削除ができます。

<img src="https://qiita-user-contents.imgix.net/https%3A%2F%2Fqiita-image-store.s3.ap-northeast-1.amazonaws.com%2F0%2F816933%2F9ebadd8e-48c3-281c-c6e0-b8e057a45405.png?ixlib=rb-4.0.0&auto=format&gif-q=60&q=75&w=1400&fit=max&s=e9fb713a2f14ea14ef361f6010ffddd7" alt="Make3">

次は作り方ステップも追加します。必要な場合であれば写真のアップロードも可能です。

<img src="https://qiita-user-contents.imgix.net/https%3A%2F%2Fqiita-image-store.s3.ap-northeast-1.amazonaws.com%2F0%2F816933%2Fef1e4e8d-c499-0e67-f970-c038941df27f.png?ixlib=rb-4.0.0&auto=format&gif-q=60&q=75&w=1400&fit=max&s=d3a474878676776336866ede78abe999" alt="Make4">

最後に、このレシピを作るための注意点も一筆で書きましょう。

ちなみに、麻婆豆腐を作るなら絹豆腐の方がお美味しいでしょうね。

いざ、投稿へ！

## レシピ投稿

やっと、レシピを投稿しましたー！！

<img src="https://qiita-user-contents.imgix.net/https%3A%2F%2Fqiita-image-store.s3.ap-northeast-1.amazonaws.com%2F0%2F816933%2F7cb55911-ea51-e261-afab-386cbbfe6467.png?ixlib=rb-4.0.0&auto=format&gif-q=60&q=75&w=1400&fit=max&s=44abd9286bb5b631cb7d9ee8cc51a2ea" alt="Recipe1">

<img src="https://qiita-user-contents.imgix.net/https%3A%2F%2Fqiita-image-store.s3.ap-northeast-1.amazonaws.com%2F0%2F816933%2F7e4faeeb-0b90-a073-c87f-7a60f52ed5a8.png?ixlib=rb-4.0.0&auto=format&gif-q=60&q=75&w=1400&fit=max&s=b66277f319b8b0b74b867a4f3c6a2542" alt="Recipe2">

<img src="https://qiita-user-contents.imgix.net/https%3A%2F%2Fqiita-image-store.s3.ap-northeast-1.amazonaws.com%2F0%2F816933%2F97c12325-b664-99f3-46eb-d59d0ef5eba5.png?ixlib=rb-4.0.0&auto=format&gif-q=60&q=75&w=1400&fit=max&s=a6eab664a5209e0cd2c64cd04945db97" alt="Recipe3">

先ほど適当に書いたレシピをちゃんと反映されました。

レシピの中に何か追加したい内容があれば、もちろん再編集して、更新できます。

## もっと詳しく知りたい...？

もっとたくさんの裏話を知りたい？→[完全版記事](https://qiita.com/FrancineH/items/25d9eccac22e43dd5fcb)

私の経歴を知りたい？→[Wantedly](https://qiita.com/FrancineH/items/25d9eccac22e43dd5fcb)

Let's connect!→[Twitter(X)](https://twitter.com/Francine_webdev)

お読みいただき、ありがとうございます！
