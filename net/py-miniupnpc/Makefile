# $FreeBSD$

CATEGORIES=	net python
PKGNAMEPREFIX=	${PYTHON_PKGNAMEPREFIX}

COMMENT=	Python module for miniupnpc

BUILD_DEPENDS=	${NONEXISTENT}:${PORTSDIR}/net/miniupnpc:build

MASTERDIR=	${.CURDIR}/../miniupnpc

USES=		python
USE_PYTHON=	distutils

WRKDIR=		${WRKDIRPREFIX}${MASTERDIR}/work
PLIST=		${.CURDIR}/pkg-plist

.if exists(${.CURDIR}/Makefile.local)
.include "${.CURDIR}/Makefile.local"
.endif

post-patch:
	${REINPLACE_CMD} 's/\(version\)="[^"]*"/\1="${PORTVERSION}"/' \
		${WRKSRC}/setup.py

post-install:
	${STRIP_CMD} ${STAGEDIR}${PYTHONPREFIX_SITELIBDIR}/miniupnpc.so

.include "${MASTERDIR}/Makefile"
