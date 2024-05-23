<p class="contactForm__notice">
	ご返信に1週間ほどお時間をいただいております。<br>
	1週間を過ぎても返信がない場合は、お手数ですが再度お問い合わせをお願いいたします。
</p>

<div class="contactForm__list">

	<dl class="contactForm__item">
		<dt class="contactForm__title -required">お名前</dt>
		<dd class="contactForm__input">
			[mwform_text name="name" id="name" size="60" placeholder="お名前"]
		</dd>
	</dl>

	<dl class="contactForm__item">
		<dt class="contactForm__title -required">フリガナ</dt>
		<dd class="contactForm__input">
			[mwform_text name="kana" id="kana" size="60" placeholder="フリガナ"]
		</dd>
	</dl>

	<dl class="contactForm__item">
		<dt class="contactForm__title">ご年齢</dt>
		<dd class="contactForm__input">
			[mwform_select name="age" id="age" children=":ご選択下さい,25歳未満,25～30歳未満,30～35歳未満,35～40歳未満,40～45歳未満,45歳以上" post_raw="true"]
		</dd>
	</dl>

	<dl class="contactForm__item">
		<dt class="contactForm__title -required">Email</dt>
		<dd class="contactForm__input">
			[mwform_email name="email" id="email" size="60" placeholder="Email Address"]
		</dd>
	</dl>

	<dl class="contactForm__item">
		<dt class="contactForm__title ">電話番号</dt>
		<dd class="contactForm__input">
			[mwform_tel name="tel" id="tel" size="60"]
		</dd>
	</dl>

	<dl class="contactForm__item">
		<dt class="contactForm__title -required">お問い合わせ内容（自由記述）</dt>
		<dd class="contactForm__input">
			[mwform_textarea name="notes" id="notes" cols="50" rows="5" placeholder="お問い合わせ内容をご記入ください"]
		</dd>
	</dl>

	<div class="contactForm__submitWrap">
		<div class="contactForm__buttonWrap -submit">
			[mwform_submitButton name="submit" confirm_value="確認する" submit_value="送信する"]
			[mwform_backButton value="修正する"]
		</div>
	</div>
</div>
