FasdUAS 1.101.10   ��   ��    k             j     �� �� 0 api_url API_URL  m        , &http://api.nabaztag.com/vl/FR/api.jsp?      	 
 	 j    �� �� 0 	api_token 	API_TOKEN  m        
1185243173    
     j    �� �� 0 api_mac API_MAC  m        0013d3862c5c         l     �� ��      Available voices are:         l     �� ��      French voices :         l     �� ��         * julie22k         l     �� ��         * claire22s         l     �� ��         * caroline22k        !   l     �� "��   "      * bruno22k    !  # $ # l     ������  ��   $  % & % l     �� '��   '   English voices :    &  ( ) ( l     �� *��   *      * graham22s    )  + , + l     �� -��   -      * lucy22s    ,  . / . l     �� 0��   0      * heather22k    /  1 2 1 l     �� 3��   3      * ryan22k    2  4 5 4 l     �� 6��   6      * aaron22s    5  7 8 7 l     �� 9��   9      * laura22s    8  : ; : l     ������  ��   ;  < = < j   	 �� >�� 0 	set_voice 	SET_VOICE > m   	 
 ? ?  ryan22k    =  @ A @ l     ������  ��   A  B C B l     �� D��   D    Time to Live, in seconds.    C  E F E l     �� G��   G 3 - This is currently broken on the Violet side.    F  H I H j    �� J�� 0 set_ttl SET_TTL J m     K K  1    I  L M L l     ������  ��   M  N O N i     P Q P I      �� R���� 0 nabaztagears NabaztagEars R  S T S o      ���� 0 leftear   T  U�� U o      ���� 0 rightear  ��  ��   Q n     V W V I    �� X���� 0 nabazservice NabazService X  Y�� Y b    
 Z [ Z b     \ ] \ b     ^ _ ^ b     ` a ` m     b b  	&posleft=    a o    ���� 0 leftear   _ m     c c  
&posright=    ] o    ���� 0 rightear   [ m    	 d d  &ears=ok   ��  ��   W  f      O  e f e l     ������  ��   f  g h g i     i j i I      �� k���� 0 nabaztagsay NabaztagSay k  l m l o      ���� 0 message   m  n�� n o      ���� 	0 voice  ��  ��   j n     o p o I    �� q���� 0 nabazservice NabazService q  r�� r b     s t s b     u v u b    	 w x w m     y y  &tts=    x I    �� z���� 0 	urlencode   z  {�� { o    ���� 0 message  ��  ��   v m   	 
 | |  &voice=    t o    ���� 	0 voice  ��  ��   p  f      h  } ~ } l     ������  ��   ~   �  i     � � � I      �� ����� 0 nabazservice NabazService �  ��� � o      ���� 0 command  ��  ��   � k     % � �  � � � r      � � � l     ��� � b      � � � b      � � � b      � � � b      � � � b      � � � o     ���� 0 api_url API_URL � m     � �  token=    � o    ���� 0 	api_token 	API_TOKEN � m     � � 
 &sn=    � o    ���� 0 api_mac API_MAC � o    ���� 0 command  ��   � o      ���� 0 d   �  ��� � r    % � � � I   #�� ���
�� .sysoexecTEXT���     TEXT � b     � � � b     � � � m     � � > 8curl --connect-timeout 35 --max-time 30 --get -d --url "    � o    ���� 0 d   � m     � �  "    ��   � o      ���� 0 responsetext responseText��   �  � � � l     ������  ��   �  � � � i     � � � I      �� ����� 0 	urlencode   �  ��� � o      ���� 0 thetext theText��  ��   � k     � �  � � � r      � � � m      � �       � o      ���� 0 
thetextenc 
theTextEnc �  � � � X     ��� � � k    � � �  � � � r     � � � o    ���� 0 eachchar eachChar � o      ���� 0 usechar useChar �  � � � r    ! � � � I   �� ���
�� .sysoctonshor       TEXT � o    ���� 0 eachchar eachChar��   � o      ���� 0 eachcharnum eachCharNum �  � � � Z   " � � � ��� � =   " % � � � o   " #���� 0 eachcharnum eachCharNum � m   # $����   � r   ( + � � � m   ( ) � �  +    � o      ���� 0 usechar useChar �  � � � F   .  � � � F   . k � � � F   . Y � � � F   . I � � � F   . 9 � � � l  . 1 ��� � >   . 1 � � � o   . /���� 0 eachcharnum eachCharNum � m   / 0���� *��   � l  4 7 ��� � >   4 7 � � � o   4 5���� 0 eachcharnum eachCharNum � m   5 6���� _��   � l  < G ��� � G   < G � � � A   < ? � � � o   < =���� 0 eachcharnum eachCharNum � m   = >���� - � ?   B E � � � o   B C���� 0 eachcharnum eachCharNum � m   C D���� .��   � l  L W ��� � G   L W � � � A   L O � � � o   L M���� 0 eachcharnum eachCharNum � m   M N���� 0 � ?   R U � � � o   R S���� 0 eachcharnum eachCharNum � m   S T���� 9��   � l  \ i ��� � G   \ i � � � A   \ _ � � � o   \ ]���� 0 eachcharnum eachCharNum � m   ] ^���� A � ?   b g � � � o   b c���� 0 eachcharnum eachCharNum � m   c f���� Z��   � l  n } ��� � G   n } � � � A   n s � � � o   n o���� 0 eachcharnum eachCharNum � m   o r���� a � ?   v { � � � o   v w���� 0 eachcharnum eachCharNum � m   w z���� z��   �  ��� � k   � � � �  � � � r   � � � � � I  � ��� � �
�� .sysorondlong        doub � l  � � ��� � ^   � � � � � o   � ����� 0 eachcharnum eachCharNum � m   � ����� ��   � �� ��
�� 
dire  m   � ���
�� olierndD��   � o      ���� 0 firstdig firstDig �  r   � � `   � � o   � ����� 0 eachcharnum eachCharNum m   � �����  o      ���� 0 	seconddig 	secondDig  Z   � �	
���	 ?   � � o   � ��~�~ 0 firstdig firstDig m   � ��}�} 	
 k   � �  r   � � [   � � o   � ��|�| 0 firstdig firstDig m   � ��{�{ 7 o      �z�z 0 anum aNum �y r   � � I  � ��x�w
�x .sysontocTEXT       shor o   � ��v�v 0 anum aNum�w   o      �u�u 0 firstdig firstDig�y  ��  �    Z   � ��t�s ?   � � o   � ��r�r 0 	seconddig 	secondDig m   � ��q�q 	 k   � �   r   � �!"! [   � �#$# o   � ��p�p 0 	seconddig 	secondDig$ m   � ��o�o 7" o      �n�n 0 anum aNum  %�m% r   � �&'& I  � ��l(�k
�l .sysontocTEXT       shor( o   � ��j�j 0 anum aNum�k  ' o      �i�i 0 	seconddig 	secondDig�m  �t  �s   )*) r   � �+,+ c   � �-.- l  � �/�h/ b   � �010 b   � �232 m   � �44  %   3 l  � �5�g5 c   � �676 o   � ��f�f 0 firstdig firstDig7 m   � ��e
�e 
TEXT�g  1 l  � �8�d8 c   � �9:9 o   � ��c�c 0 	seconddig 	secondDig: m   � ��b
�b 
TEXT�d  �h  . m   � ��a
�a 
TEXT, o      �`�` 0 numhex numHex* ;�_; r   � �<=< o   � ��^�^ 0 numhex numHex= o      �]�] 0 usechar useChar�_  ��  ��   � >�\> r   � �?@? c   � �ABA b   � �CDC o   � ��[�[ 0 
thetextenc 
theTextEncD o   � ��Z�Z 0 usechar useCharB m   � ��Y
�Y 
TEXT@ o      �X�X 0 
thetextenc 
theTextEnc�\  �� 0 eachchar eachChar � n    
EFE 2   
�W
�W 
cha F o    �V�V 0 thetext theText � G�UG L  HH o  �T�T 0 
thetextenc 
theTextEnc�U   � IJI l     �S�R�S  �R  J KLK l    *M�QM O     *NON k    )PP QRQ O    STS k    UU VWV r    XYX l   Z�PZ 1    �O
�O 
AchN�P  Y o      �N�N 0 	theperson 	thePersonW [�M[ r    \]\ l   ^�L^ n    _`_ 1    �K
�K 
AcMs` m    �J
�J 
AcoA�L  ] o      �I�I 0 
themessage 
theMessage�M  T l   
a�Ha n    
bcb 1    
�G
�G 
AiACc l   d�Fd 4   �Ee
�E 
AiCCe m    �D�D �F  �H  R f�Cf I    )�Bg�A�B 0 nabaztagsay NabaztagSayg hih b     jkj b    lml o    �@�@ 0 	theperson 	thePersonm m    nn   said    k o    �?�? 0 
themessage 
theMessagei o�>o o     %�=�= 0 	set_voice 	SET_VOICE�>  �A  �C  O m     pp�null     ߀��   	Adium.app�U  0�9 'W
�����  $ay��5 8����4�W
�x�����B�l�AdIM   alis    H  Macintosh HD               »��H+     	Adium.app                                                       e�%v        ����  	                Applications    »��      �%=�         #Macintosh HD:Applications:Adium.app    	 A d i u m . a p p    M a c i n t o s h   H D  Applications/Adium.app  / ��  �Q  L qrq l     �<�;�<  �;  r s�:s i    "tut I      �9�8�7�9 0 
substitute  �8  �7  u k     vv wxw r     yzy m     {{  Forwarded to Nabaztag   z 1      �6
�6 
rsltx |�5| L    }} 1    �4
�4 
rslt�5  �:       �3~    ? K������3  ~ �2�1�0�/�.�-�,�+�*�)�(�2 0 api_url API_URL�1 0 	api_token 	API_TOKEN�0 0 api_mac API_MAC�/ 0 	set_voice 	SET_VOICE�. 0 set_ttl SET_TTL�- 0 nabaztagears NabaztagEars�, 0 nabaztagsay NabaztagSay�+ 0 nabazservice NabazService�* 0 	urlencode  �) 0 
substitute  
�( .aevtoappnull  �   � **** �' Q�&�%���$�' 0 nabaztagears NabaztagEars�& �#��# �  �"�!�" 0 leftear  �! 0 rightear  �%  � � ��  0 leftear  � 0 rightear  �  b c d�� 0 nabazservice NabazService�$ )�%�%�%�%k+ � � j������ 0 nabaztagsay NabaztagSay� ��� �  ��� 0 message  � 	0 voice  �  � ��� 0 message  � 	0 voice  �  y� |�� 0 	urlencode  � 0 nabazservice NabazService� )�*�k+ %�%�%k+ � � ������� 0 nabazservice NabazService� ��� �  �� 0 command  �  � ���
� 0 command  � 0 d  �
 0 responsetext responseText�  � � � ��	
�	 .sysoexecTEXT���     TEXT� &b   �%b  %�%b  %�%E�O�%�%j E�� � ������� 0 	urlencode  � ��� �  �� 0 thetext theText�  � 	��� ������������� 0 thetext theText� 0 
thetextenc 
theTextEnc�  0 eachchar eachChar�� 0 usechar useChar�� 0 eachcharnum eachCharNum�� 0 firstdig firstDig�� 0 	seconddig 	secondDig�� 0 anum aNum�� 0 numhex numHex�  ������������� �������������������������������������4��
�� 
cha 
�� 
kocl
�� 
cobj
�� .corecnte****       ****
�� .sysoctonshor       TEXT��  �� *�� _
�� 
bool�� -�� .�� 0�� 9�� A�� Z�� a�� z�� 
�� 
dire
�� olierndD
�� .sysorondlong        doub�� 	�� 7
�� .sysontocTEXT       shor
�� 
TEXT��E�O ���-[��l kh �E�O�j E�O��  �E�Y Ť�	 ���&	 ��
 ���&�&	 ��
 ���&�&	 ��
 	�a �&�&	 �a 
 	�a �&�& p�a !a a l E�O�a #E�O�a  �a E�O�j E�Y hO�a  �a E�O�j E�Y hOa �a &%�a &%a &E�O�E�Y hO��%a &E�[OY�O�� ��u���������� 0 
substitute  ��  ��  �  � {��
�� 
rslt�� �E�O�E� �����������
�� .aevtoappnull  �   � ****� k     *�� K����  ��  ��  �  � 
p��������������n��
�� 
AiCC
�� 
AiAC
�� 
AchN�� 0 	theperson 	thePerson
�� 
AcoA
�� 
AcMs�� 0 
themessage 
theMessage�� 0 nabaztagsay NabaztagSay�� +� '*�k/�, *�,E�O��,E�UO*��%�%b  l+ 	U ascr  ��ޭ