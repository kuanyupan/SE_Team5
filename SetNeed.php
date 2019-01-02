
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" type="text/css" href="setNeed.css" >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>

  <SCRIPT LANGUAGE="JavaScript">

function rand()
{
  var o=document.getElementsByTagName('input');
  for( i=0;i<50;i++){
　o[i].value=fRandomBy(1,50);
}
      

      function fRandomBy(under, over){
              return parseInt(Math.random()*(over-under+1) + under);
              
          }

}
</SCRIPT>





</head>
<body>

<h1>50期需求</h1>

<form action="addfifty.php" method="post" name="fifty" id="fifty">
<table  class="settable">
<tr>
<th>1</th>
 <td  ><input type="number" name="need[]"   min="0" max="50" value="0" ></td>
 <th>2</th>
 <td><input type="number"  name="need[]"  min="0" max="50" value="0"></td>
 <th>3</th>
 <td><input type="number"  name="need[]" min="0" max="50" value="0" ></td>
 <th>4</th>
 <td><input type="number" name="need[]"  min="0" max="50" value="0"></td>
 <th>5</th>
 <td><input type="number" name="need[]" min="0" max="50" value="0"></td>


 <th>6</th>
 <td><input type="number" name="need[]"  min="0" max="50" value="0"></td>
 <th>7</th>
 <td><input type="number" name="need[]"  min="0" max="50" value="0"></td>
 <th>8</th>
 <td><input type="number" name="need[]"  min="0" max="50" value="0"></td>
 <th>9</th>
 <td><input type="number" name="need[]"  min="0" max="50" value="0"></td>
 <th>10</th>
 <td><input type="number" name="need[]"  min="0" max="50" value="0"></td>
 </tr>
 <tr>
 <th>11</th>
 <td><input type="number" name="need[]"  min="0" max="50" value="0"></td>
 <th>12</th>
 <td><input type="number" name="need[]"  min="0" max="50" value="0"></td>
 <th>13</th>
 <td><input type="number" name="need[]"  min="0" max="50" value="0"></td>
 <th>14</th>
 <td><input type="number" name="need[]"  min="0" max="50" value="0"></td>
 <th>15</th>
 <td><input type="number" name="need[]"  min="0" max="50" value="0"></td>


 <th>16</th>
 <td><input type="number" name="need[]"  min="0" max="50" value="0"></td>
 <th>17</th>
 <td><input type="number" name="need[]"  min="0" max="50" value="0"></td>
 <th>18</th>
 <td><input type="number" name="need[]"  min="0" max="50" value="0"></td>
 <th>19</th>
 <td><input type="number" name="need[]"  min="0" max="50" value="0"></td>
 <th>20</th>
 <td><input type="number" name="need[]"  min="0" max="50" value="0"></td>
 </tr>
 <tr>
 <th>21</th>
 <td><input type="number" name="need[]"  min="0" max="50" value="0"></td>
 <th>22</th>
 <td><input type="number" name="need[]"  min="0" max="50" value="0"></td>
 <th>23</th>
 <td><input type="number" name="need[]"  min="0" max="50" value="0"></td>
 <th>24</th>
 <td><input type="number"  name="need[]"  min="0" max="50" value="0"></td>
 <th>25</th>
 <td><input type="number" name="need[]" min="0" max="50" value="0"></td>


 <th>26</th>
 <td><input type="number" name="need[]"  min="0" max="50" value="0"></td>
 <th>27</th>
 <td><input type="number" name="need[]"  min="0" max="50" value="0" ></td>
 <th>28</th>
 <td><input type="number" name="need[]"  min="0" max="50" value="0"></td>
 <th>29</th>
 <td><input type="number" name="need[]"   min="0" max="50" value="0"></td>
 <th>30</th>
 <td><input type="number"  name="need[]"  min="0" max="50" value="0"></td>
 </tr>
 <tr>
 <th>31</th>
 <td><input type="number"  name="need[]"  min="0" max="50" value="0"></td>
 <th>32</th>
 <td><input type="number"  name="need[]"  min="0" max="50" value="0"></td>
 <th>33</th>
 <td><input type="number"  name="need[]"  min="0" max="50" value="0"></td>
 <th>34</th>
 <td><input type="number"  name="need[]"  min="0" max="50" value="0"></td>
 <th>35</th>
 <td><input type="number"  name="need[]"  min="0" max="50" value="0"></td>


 <th>36</th>
 <td><input type="number"  name="need[]"  min="0" max="50" value="0"></td>
 <th>37</th>
 <td><input type="number"  name="need[]"  min="0" max="50" value="0"></td>
 <th>38</th>
 <td><input type="number"  name="need[]"  min="0" max="50" value="0"></td>
 <th>39</th>
 <td><input type="number"  name="need[]"  min="0" max="50" value="0"></td>
 <th>40</th>
 <td><input type="number"  name="need[]"  min="0" max="50" value="0"></td>
 </tr>
 <tr>
 <th>41</th>
 <td><input type="number"  name="need[]"  min="0" max="50" value="0"></td>
 <th>42</th>
 <td><input type="number"  name="need[]"  min="0" max="50" value="0"></td>
 <th>43</th>
 <td><input type="number" name="need[]"   min="0" max="50" value="0"></td>
 <th>44</th>
 <td><input type="number"  name="need[]"  min="0" max="50" value="0" ></td>
 <th>45</th>
 <td><input type="number"  name="need[]"  min="0" max="50"value="0" ></td>


 <th>46</th>
 <td><input type="number"  name="need[]"  min="0" max="50" value="0"></td>
 <th>47</th>
 <td><input type="number"  name="need[]"  min="0" max="50" value="0"></td>
 <th>48</th>
 <td><input type="number"  name="need[]"  min="0" max="50" value="0"></td>
 <th>49</th>
 <td><input type="number" name="need[]"   min="0" max="50" value="0"></td>
 <th>50</th>
 <td><input type="number" name="need[]"  min="0" max="50" value="0" ></td>
 </tr>
  </table>

</br>
 <input class="rainbow-button" type="submit"></br>

 <INPUT class="rainbow-button" TYPE="button" VALUE="Random " onClick="rand()"></br>
 <input class="rainbow-button" type ="button" onclick="javascript:location.href='teamView.php'" value="回到首頁"></input>

</form>
<p id="not"></p>
</body>
</html>
