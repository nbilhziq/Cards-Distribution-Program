# Cards-Distribution-Program
Written using PHP Codeigniter framework for distributing playing cards to n(number) of people.

# Theme
Playing cards will be given out to n(number) people

# Purpose
Total 52 cards containing 1-13 of each Spade(S), Heart(H), Diamond(D), Club(C) will be
given to n people randomly.

# Language
PHP / HTML / CSS / Javascript / jQuery

# Program Input
<div class="snippet-clipboard-content notranslate position-relative overflow-auto">
	<pre class="notranslate">
		<code>
a. Number of people (numerical value)
b. It does not matter how cards are given if recompile of program arguments, parameter,
keyboard input and so on are not necessary.
c. In case input value is nil or value is invalid then the error message of “Input value does
not exist or value is invalid” must be displayed and the process must be terminated.
d. Any number less than 0 is an invalid value.
e. Greater than 53 are normal values and cards must be distributed to a number of people
instead of having it as an error.
		</code>
	</pre>
</div>

# Output Format
<div class="snippet-clipboard-content notranslate position-relative overflow-auto">
	<pre class="notranslate">
		<code>
a. Spade = S, Heart = H, Diamond = D, Club = C
b. Card 2 to 9 are, as it is, 1=A,10=X,11=J,12=Q,13=K
c. The card distributed to the first person on the first row will be separated (comma),
d. The card distributed to the second person on the second row will be separated(comma),
e. [LF] is not allowed. Example:
	S-A,H-X,.....
	D-3,H-J,.....
		</code>
	</pre>
</div>

# Getting Started
With XAMPP
<div class="snippet-clipboard-content notranslate position-relative overflow-auto">
	<pre class="notranslate">
		<code>
a. Copy the file folder to your htdocs directory.
b. Start the XAMPP Apache Services.
c. Open your web browser and type <b><em>http://localhost/cards</em></b> in the address bar.
		</code>
	</pre>
</div>

Without XAMPP
<div class="snippet-clipboard-content notranslate position-relative overflow-auto">
	<pre class="notranslate">
		<code>
a. Open Command Prompt or Terminal.
b. Navigate to directory that store the code.
	For example code directory is <b><em>C:/xampp/htdocs/cards</em></b>
	at CMD / Terminal type <b><em>cd C:/xampp/htdocs/</em></b>
c. Start the PHP Built-in Server.
	<b><em>php -S 127.0.0.1:8080 -t cards</em></b>
d. Open your web browser and type <b><em>http://127.0.0.1:8080/</em></b> in the address bar.
		</code>
	</pre>
</div>

Interface</br>
<img width="929" alt="image" src="https://github.com/nbilhziq/Cards-Distribution-Program/assets/149320866/42221dd1-d65a-41d4-8387-9bb156758db5"></br>
Result Output</br>
<img width="922" alt="image" src="https://github.com/nbilhziq/Cards-Distribution-Program/assets/149320866/644f9dde-a773-4658-b814-071856b4a1cd"></br>
Error Handling</br>
<img width="917" alt="image" src="https://github.com/nbilhziq/Cards-Distribution-Program/assets/149320866/25ee0a0d-45b8-4804-ad92-9682d8e950b4"></br>
